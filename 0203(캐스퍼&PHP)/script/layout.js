$(function(){

  $(window).scroll(function(){
    let sPos = $(this).scrollTop();
    // console.log(sPos);


  // 스크롤 기능을 사용하여 header, gnb에 서식을 적용하기
    if(sPos>=700){
      $('header').addClass('h_on');
      $('header .gnb a').addClass('on');
      $('header i.fas').addClass('on');
      $('header h1 img').attr('src','./images/logo-casper_black.png')
    }else{
      $('header').removeClass('h_on');
      $('header .gnb a').removeClass('on');
      $('header i.fas').removeClass('on');
      $('header h1 img').attr('src','./images/logo-casper-white.png')
    };

  });


  // header에 마우스 오버시 로고, 내비게이션, i.fas에 서식 적용
  $('header').hover(function(){
    $(this).addClass('h_on');
    $('header .gnb a').addClass('on');
    $('header i.fas').addClass('on');
    $('header h1 img').attr('src','./images/logo-casper_black.png')

  // header에 마우스 오버시 로고, 내비게이션, i.fas에 서식 제거
  }, function(){
    $(this).removeClass('h_on');
    $('header .gnb a').removeClass('on');
    $('header i.fas').removeClass('on');
    $('header h1 img').attr('src','./images/logo-casper-white.png')
  });


  //아래로 이동하기 버튼을 클릭시 top 컨텐츠가 상단 940 높이로 올라오게 하기
  $('#next_btn').click(function(){
    $('html, body').animate({scrollTop:$('#top3').offset().top-70}, 500, 'easeOutCubic');
  });
  //내비게이션 클릭시 해당 콘텐츠가 상단으로 올라오게 하기


  // 메뉴 클릭시 해당하는 영역으로 스크롤 되게 하기
  let mnu = $('.gnb li, #m_nav li')

  mnu.click(function(){
    
    let n = $(this).index();
    console.log(n);
    
    $('html, body').animate({scrollTop:$('main section').eq(n+2).offset().top-70}, 500, 'easeOutCubic');
    
    return false;

  });







});