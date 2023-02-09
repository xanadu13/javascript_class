

// 1. 변수선언
// 메인메뉴 클릭시 서브가 나오게 하기
let gnb = document.querySelectorAll('.gnb > ul > li');
let sub = document.querySelectorAll('.gnb .sub');
let main = document.querySelector('main');

// 메인메뉴의 영역을 클릭시 서브가 숨겨지게 하기
for(let i=0; i<gnb.length; i++){
  gnb[i].addEventListener('click', ()=>{
    console.log(gnb[i]);
    
    const child = gnb[i].children;
    console.log(child[1]); // 배열값(2번째(.sub))
  
    // li 태그 안에 있는 .sub 를 모두 숨기기
    for(let j=0; j<sub.length; j++){
    sub[j].style.display='none';
    };

    // 내가 선택한 요소(li)의 sub만 나오게하기
    child[1].style.display='block';
    // $(this).find('.sub').show(); 제이쿼리

    parent.child[1].style.display='none';
    // $(this).parent().siblings().find('.sub').hide(); 제이쿼리

  });
};

// 메인영역 클릭시 서브메뉴 숨기기
main.addEventListener('click', ()=>{
  for(let j=0; j<sub.length; j++){
  sub[j].style.display='none';
  };
});