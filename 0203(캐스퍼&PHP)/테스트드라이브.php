<!doctype html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <meta name="veiwport" content="width=device-width, initial-scale=1">
  <title>시승 신청 조회하기</title>
  <style>
    caption{
      font-size: 26px;
      color: #212772;
      font-weight: bold;
      text-align: center;
      margin-bottom: 25px;
    }

    table {
    border: 1px #333 solid;
    font-size: 14px;
    width: 1200px;
    border-collapse: collapse;
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0,0,0,.25);
    margin: 0px auto;
  }

  th {
    padding: 0px 10px;
    text-align: left;
    background: #212772;
    color: #fff;
    text-transform: uppercase;
    overflow: hidden;
  }

  td, th {
    padding: 16px 10px;
    vertical-align: middle;
  }
    
  td {
    border-bottom: 1px solid rgba(0,0,0,.1);
    background: #fff;
  }
  </style>
</head>
<body>
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

    print "<table><caption>시승 신청 조회하기</caption><tr>" .
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
      "<td>" . $row[7] . "</td></tr>";
    }        
    print "</table>";
    mysqli_free_result($result);
    mysqli_close($conn);
  ?>


</body>
</html>