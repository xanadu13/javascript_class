

    // 이벤트 & 프로모션 슬라이드 스크립트


    //변수선언
    const slide_w = document.querySelector('.event_slide_wrap')
    const slide = document.querySelector('.event_slide');
    const slide_img = document.querySelectorAll('.event_slide li img');
    const l_btn = document.querySelector('.event_slide_wrap .fa-angle-left');
    const r_btn = document.querySelector('.event_slide_wrap .fa-angle-right');
    const con_btn = document.querySelector('.event_con_btn');

    const img_n = slide_img.length;  //목록개수
    const img_w = 100; //이미지 한장 너비
    const m = 0; //마진값
    const s_con = 1; //보여줄 개수

    let count = 0;

    //감싸는 부모요소의 너비를 구하기
    slide.style.width = (img_w+m)*img_n - m + '%';
    // console.log(slide.style.width);
    // 1620=(300+30)*5-30px

    //함수작성
    function mslide(n){
      slide.style.left = (img_w+m)* -n  + '%'; //
      count = n;
    }

    //3초마다 mslide를 호출하여 자동으로 움직이게 함.
    var Timer = setInterval(function(){
      if(count < img_n-s_con){
        mslide(count+1);
      }else{
        mslide(0);
      }
    },3000);


    //이전버튼 클릭시 해당 방향으로 움직이게
    l_btn.addEventListener('click', function(){
      if(count > 0){
        mslide(count-1);
      }else{
        mslide(img_n - s_con);
      }
    });

    //다음버튼
    r_btn.addEventListener('click', function(){
      if(count < img_n-s_con){
        mslide(count+1);
      }else{
        mslide(0);
      }
    });

// classList.add("event_con_btn_on")
// classList.remove("event_con_btn_on")
// https://devinus.tistory.com/45


    // 모달 띄우기 제이쿼리 소스
    
    $(function(){


      let modal = `
      <div class="modal">
        <div class="m_inner">
            <img src="./images/pc_prod_notice_20230203.jpg" alt="모달배너">
            <p>
              <input type="checkbox" id="ch"><label for="ch"> 일주일간 열지 않음</label>
              <a href="#" title="닫기">닫기</a>
            </p>
          </div>
      </div>
    `;

      $('body').append(modal);


      // 쿠키 생성하기
      let ch = $('.modal #ch') //체크박스 변수선언

      // 쿠키파일이 현재 브라우저에 존재하면 모달창이 나오지 않도록 설정
      if($.cookie('popup') == 'none'){
        $('.modal').hide();
      };

      // 쿠키의 존재여부를 체크하여 쿠키를 생성하거나 모달을 숨긴다.
      function closeModal(){

        if(ch.is(':checked')){
          $.cookie('popup','none', {expire:7, path:'/'});
        }
        $('.modal').hide();
      };
       //체크박스를 체크한 경우라면 쿠키를 생성하고 그렇지 않다면 그냥 모달을 숨긴다.


      // 닫기 버튼을 클릭하면 closeModal 함수를 실행
      $('.modal p a').click(function(){
        closeModal();
      })

    });



    
    // 메인콘텐츠 랜덤 배너 구현

    // 1. 자바스크립트로 구현
    let ran = Math.floor(Math.random()*3+1);
    console.log(ran); // 1~3

    document.getElementById('eb').src="./images/ranbanner0" + ran + '.jpg';

    // 2. 제이쿼리로 구현
    // $(function(){
    //   let ran01 = Math.floor(Math.random()*3+1);
    //   $('#eb').attr('src', './images/ranbanner0' + ran01 + '.jpg');
    // });