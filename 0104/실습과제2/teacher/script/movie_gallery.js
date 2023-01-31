
let n = 1; //초기값

const img_list = document.querySelectorAll('.lnb>li');

const left_btn = document.querySelector('i.fa-angle-left');
const right_btn = document.querySelector('i.fa-angle-right');


document.getElementById('page').innerHTML=n+'/16건';

img_list.forEach((el, index) => {
  el.onclick=()=>{
    n = index+1; // 인덱스 번호에 1을 더하여 1부터 나오게 한다.
    
    // el : 그냥 지은 매개변수명 = li 태그 16개
    // index : 0부터 15번까지 번호를 매기겠다
    // ()=> : function 생략 기호
    
    document.getElementById('page').innerHTML=n+'/16건';
    document.getElementById('photo').src='./images/movie_image'+n+'.jpg'
  }
});

left_btn.addEventListener('click', function(){
  if(n == 1){
    n=16;
  }else{
    n--;
  }
  console.log(n);
  document.getElementById('page').innerHTML=n+'/16건';
  document.getElementById('photo').src='./images/movie_image'+n+'.jpg'
});

right_btn.addEventListener('click', function(){
  if(n == 16){
    n=1;
  }else{
    n++;
  }
  console.log(n);
  document.getElementById('page').innerHTML=n+'/16건';
  document.getElementById('photo').src='./images/movie_image'+n+'.jpg'
});
