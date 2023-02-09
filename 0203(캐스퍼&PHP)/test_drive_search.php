<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>현대자동차 캐스퍼 - 시승신청 예약하기</title>

  <!-- 초기화 -->
  <link href="./css/reset.css" rel="stylesheet" type="text/css">
  <!-- 기본서식, 공통서식 -->
  <link href="./css/base.css" rel="stylesheet" type="text/css">
  <!-- 공통 레이아웃 서식 -->
  <link href="./css/common.css" rel="stylesheet" type="text/css">
  <!-- 콘텐츠 영역서식 -->
  <link href="./css/drive.css" rel="stylesheet" type="text/css">
  <!-- 아이콘폰트 주소 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- css3추가속성시 접두사 자동으로 붙여주는 스크립트 -->
  <script src="./script/prefixfree.min.js"></script>
  <!-- 제이쿼리 라이브러리 -->
  <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
  <!-- 제이쿼리 ui라이브러리 -->
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <!-- 제이쿼리 쿠키파일 -->
  <script src="./script/jquery.cookie.js" defer></script>

</head>
<body>
  <header>
    <h1>
      <a href="index.html" title="메인페이지로 바로가기">
        <img src="./images/logo-casper_black.png" alt="상단로고">
      </a>
    </h1>

    <!-- 상단 스크롤시 고정 내비게이션 -->
    <nav>
      <ul class="gnb">
        <li><a href="#" title="소개">소개</a></li>
        <li><a href="#" title="체험">체험</a></li>
        <li><a href="#" title="이벤트">이벤트</a></li>
        <li><a href="#" title="구매안내">구매안내</a></li>
        <li><a href="#" title="고객지원">고객지원</a></li>
      </ul>
    </nav>

    <i class="fas fa-user"></i>
    <i class="fas fa-bell"></i>
    <!-- 알림아이콘 -->
  </header>

  <!-- 메인콘텐츠 영역 -->

  <main>
    
    <form name="search" method="post" action="search.php">
    
    
  <br><br>

  <fieldset class="search_box">
    <legend>시승신청 조회하기</legend>
    <input type="text" id="search_txt" name="search_txt" placeholder="예약하신 성함을 입력해주세요.">
    <input type="submit" value="시승신청 조회하기">
    <p><a href="test_drive.html" title="시승신청 예약하기" class="drive_re">시승신청 예약하기</a></p>
  </fieldset>


    <?php

    //1. 변수선언(서버주소, 아이디, 패스워드, 데이터베이스명)
    $mysql_host = 'localhost';
    $mysql_user = 'nyu';
    $mysql_password="namyeouk1!";
    $mysql_db = 'nyu';

    //2. 데이터베이스 계정연결
    $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);

    //3. 데이터베이스 연결 오류구문
    if(mysqli_connect_errno()) {
      printf("%s \n", mysqli_connect_error());
      exit;
    }

    //4. 데이터 조회하기
    $query = 'select * from drive';
    $result = mysqli_query($conn, $query); //조회결과값을 변수에 담는다. 

    print "<table><caption>시승신청 조회 결과</caption><tr>" .
            "<th>번호</th>" .
            "<th>이름</th>" . 
            "<th>전화번호</th>" .
            "<th>이메일주소</th>". 
            "<th>문자수신여부</th>".
            "<th>시승장소</th>". 
            "<th>시승차량</th>". 
            "<th>보유차종</th>". 
            "<th>시승날짜</th>". 
            "</tr>";

    while($row = mysqli_fetch_row($result)){
      print "<tr><td>" . $row[0] . "</td>" . 
      "<td>" . $row[1] . "</td>" . 
      "<td>" . $row[2] . "</td>" . 
      "<td>" . $row[3] . "</td>". 
      "<td>" . $row[4] . "</td>". 
      "<td>" . $row[5] . "</td>". 
      "<td>" . $row[6] . "</td>". 
      "<td>" . $row[7] . "</td>". 
      "<td>" . $row[8] . "</td></tr>";
    }        
    print "</table>";
    mysqli_free_result($result);
    mysqli_close($conn);
    
  ?>


  </form>

  </main>


  <footer>

    <div class="h_logo">
      <img src="./images/logo-hyundai.a9ebdc6.png" alt="현대자동차 로고">
    </div>
    
    <div class="f_con">
      <ul>
        <li><a href="#none" title="이용약관">이용약관</a></li>
        <li><a href="#none" title="개인정보 처리방침">개인정보 처리방침</a></li>
        <li><a href="#none" title="저작권 안내">저작권 안내</a></li>
        <li><a href="#none" title="공동인증서 안내">공동인증서 안내</a></li>
        <li><a href="#none" title="현대자동차 홈페이지">현대자동차 홈페이지</a></li>
      </ul>

      <dl>
        <dt>사업자등록번호 :</dt>
        <dd>101-81-09147</dd>
        
        <dt>통신판매업신고번호 :</dt>
        <dd>2002-01546</dd>
        
        <dt>대표이사 :</dt>
        <dd>장재훈
          <a href="#" title="사업자정보확인">사업자정보확인 ></a>
        </dd>

        <dt>캐스퍼 고객센터 :</dt>
        <dd>080-500-6000</dd><br>

        <dt>주소 :</dt>
        <dd>서울시 서초구 현릉로 12</dd>

        <dt>호스팅서비스 제공 :</dt>
        <dd>현대오토에버(주)</dd>
      </dl>

      <address>COPYRIGHT &copy; HYUNDAI MOTOR COMPANY ALL LIGHTS RESERVED.</address>
    </div>

  </footer>
</body>
</html>