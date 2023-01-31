<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<section id="bo_w">
    <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <?php
    $option = '';
    $option_hidden = '';
    if ($is_notice || $is_html || $is_secret || $is_mail) { 
        $option = '';
        if ($is_notice) {
            $option .= PHP_EOL.'<li class="chk_box"><input type="checkbox" id="notice" name="notice"  class="selec_chk" value="1" '.$notice_checked.'>'.PHP_EOL.'<label for="notice"><span></span>공지</label></li>';
        }
        if ($is_html) {
            if ($is_dhtml_editor) {
                $option_hidden .= '<input type="hidden" value="html1" name="html">';
            } else {
                $option .= PHP_EOL.'<li class="chk_box"><input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" class="selec_chk" value="'.$html_value.'" '.$html_checked.'>'.PHP_EOL.'<label for="html"><span></span>html</label></li>';
            }
        }
        if ($is_secret) {
            if ($is_admin || $is_secret==1) {
                $option .= PHP_EOL.'<li class="chk_box"><input type="checkbox" id="secret" name="secret"  class="selec_chk" value="secret" '.$secret_checked.'>'.PHP_EOL.'<label for="secret"><span></span>비밀글</label></li>';
            } else {
                $option_hidden .= '<input type="hidden" name="secret" value="secret">';
            }
        }
        if ($is_mail) {
            $option .= PHP_EOL.'<li class="chk_box"><input type="checkbox" id="mail" name="mail"  class="selec_chk" value="mail" '.$recv_email_checked.'>'.PHP_EOL.'<label for="mail"><span></span>답변메일받기</label></li>';
        }
    }
    echo $option_hidden;
    ?>
	
    <div class="form_01 write_div">
        <h2 class="sound_only"><?php echo $g5['title'] ?></h2>

        <?php if ($is_category) { ?>
        <div class="bo_w_select write_div">
            <label for="ca_name" class="sound_only">분류<strong>필수</strong></label>
            <select id="ca_name" name="ca_name" required>
                <option value="">선택하세요</option>
                <?php echo $category_option ?>
            </select>
        </div>
        <?php } ?> 
        
        <?php if ($is_name) { ?>
        <div class="write_div">
            <label for="wr_name" class="sound_only">이름<strong>필수</strong></label>
            <input type="text" name="wr_name" value="<?php echo $name ?>" id="wr_name" required class="frm_input full_input required" maxlength="20" placeholder="이름">
        </div>
        <?php } ?>

        <?php if ($is_password) { ?>
        <div class="write_div">
            <label for="wr_password" class="sound_only">비밀번호<strong>필수</strong></label>
            <input type="password" name="wr_password" id="wr_password" <?php echo $password_required ?> class="frm_input full_input <?php echo $password_required ?>" maxlength="20" placeholder="비밀번호">
        </div>
        <?php } ?>

        <?php if ($is_email) { ?>
        <div class="write_div">
            <label for="wr_email" class="sound_only">이메일</label>
            <input type="email" name="wr_email" value="<?php echo $email ?>" id="wr_email" class="frm_input full_input" maxlength="100" placeholder="이메일">
        </div>
        <?php } ?>

        <?php if ($is_homepage) { ?>
        <div class="write_div">
            <label for="wr_homepage" class="sound_only">홈페이지</label>
            <input type="text" name="wr_homepage" value="<?php echo $homepage ?>" id="wr_homepage" class="frm_input full_input" placeholder="홈페이지">
        </div>
        <?php } ?>

        <?php if ($option) { ?>
        <div class="write_div">
            <span class="sound_only">옵션</span>
            <ul class="bo_v_option">
            <?php echo $option ?>
            </ul>
        </div>
        <?php } ?>

        <div class="bo_w_tit write_div">
            <label for="wr_subject" class="sound_only">제목<strong>필수</strong></label>
            <input type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required class="frm_input full_input required" placeholder="제목">
        </div>
		
		<!--  보이기 숨기기 옵션 시작 : wittazzurri -->
		<script>
		document.write("<input style=display:none id=wr_10 name=wr_10 value=<?php echo $write['wr_10']; ?>>");
		if (wr_10.value == "") wr_10.value = "no*no*no*no*no";
		checkGroup = [["제목", "title"], ["본문", "con"], ["이미지", "img"], ["파일", "file"], ["링크", "link"]];
		document.write("<div class='frm_input full_input' style=display:flex;justify-content:center;align-items:center><strong style=color:#c00000>[ 숨기기 체크 ] :</strong>");
		for (ci in checkGroup) document.write("<input type=checkbox id=wr_10_" + ci + " style=margin-left:10px;margin-right:2px" + (wr_10.value.split("*")[ci] == "no" ? "" : " checked") + " onclick=checkMode()>" + checkGroup[ci][0]);
		document.write("</div>");
		function checkMode() {
			checkTotal = "";
			for (ci in checkGroup) checkTotal = checkTotal + (this["wr_10_" + ci].checked ? "bo_v_" + checkGroup[ci][1] : "no") + "*";
			wr_10.value = checkTotal.slice(0, -1);
		}
		</script>
		<!--  /보이기 숨기기 옵션 종료 : wittazzurri -->

        <div class="write_div">
            <label for="wr_content" class="sound_only">내용<strong>필수</strong></label>
            <?php if($write_min || $write_max) { ?>
            <!-- 최소/최대 글자 수 사용 시 -->
            <p id="char_count_desc">이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</p>
            <?php } ?>
            <?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
            <?php if($write_min || $write_max) { ?>
            <!-- 최소/최대 글자 수 사용 시 -->
            <div id="char_count_wrap"><span id="char_count"></span>글자</div>
            <?php } ?>
        </div>

        <?php for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) { ?>
        <div class="bo_w_link write_div">
            <label for="wr_link<?php echo $i ?>"><i class="fa fa-link" aria-hidden="true"></i> <span class="sound_only">링크 #<?php echo $i ?></span></label>
            <input type="text" name="wr_link<?php echo $i ?>" value="<?php if($w=="u"){echo $write['wr_link'.$i];} ?>" id="wr_link<?php echo $i ?>" class="frm_input wr_link" placeholder="링크를 입력하세요">
        </div>
        <?php } ?>
	
		<!--  파일업로드 박스형 시작 : wittazzurri -->
		<style>.uploadDiv { display:flex; justify-content:center; align-items:center; font-weight:bold; border-radius:5px; }</style>
		<?php
		$file_width_limit = 3;
		$file_hight_percent = 100;
		$file_text_limit = 16;
		for ($i = 0; $is_file && $i < $file_count; $i++) { ?>
			<div style=width:<?php echo 100 / $file_width_limit; ?>%;float:left<?php if ($i > $file_width_limit - 1) echo ";margin-top:10px"; ?>>
				<div style="<?php if ($i % $file_width_limit != $file_width_limit - 1) echo "width:99%;"; ?>padding:5px;border:1px solid #cccccc;border-radius:5px">
					<table style=width:100% cellpadding=0 cellspacing=0>
						<tr>
							<td style=padding:3px>
								<input style=display:none type="file" name="bf_file[]" id="bf_file_<?php echo $i + 1; ?>" onchange="divNum_<?php echo $i; ?>.innerHTML='<span style=color:#3a8afd;font-weight:bold>업로드대기▲</span>'">
								<label for="bf_file_<?php echo $i + 1; ?>" title="파일첨부 <?php echo $i + 1; ?> : 용량 <?php echo $upload_max_filesize; ?> 이하만 업로드 가능">
								<span style=color:#3a8afd;font-weight:bold;cursor:pointer><?php echo $i + 1; ?>번파일▲</span>
								</label>
							</td>
							<td style=padding:3px align=right>
								<?php if($w == "u" && $file[$i]["file"]) { ?>
								<span style=color:#c00000;font-weight:bold>삭제X</span> <input type=checkbox id=bf_file_del<?php echo $i; ?> name=bf_file_del[<?php echo $i; ?>] style=margin-top:-5px value=1>
								<?php } ?>
							</td>
						</tr>
						<?php
						$upload_file_name = ($w == "u" && $file[$i]["file"]) ? $file[$i]["source"]."(".$file[$i]["size"].")" : "[ 파일없음 ]";
						if (mb_strlen($upload_file_name, "utf-8") > $file_text_limit) $trans_file_name = "<span style=cursor:pointer onclick=copyMode('".$file[$i]['source']."','원본파일명이')>...".mb_substr($upload_file_name, -$file_text_limit, $file_text_limit, 'utf-8')."</span>";
						else {
							if ($upload_file_name == "[ 파일없음 ]") $trans_file_name = "<span>$upload_file_name</span>";
							else $trans_file_name = "<span style=cursor:pointer onclick=copyMode('".$file[$i]['source']."','원본파일명이')>$upload_file_name</span>";
						}
						?>
						<tr><td colspan=2 style="padding:0px 3px 8px 3px"><div id=divNum_<?php echo $i; ?> style=text-align:right><?php echo $trans_file_name; ?></div></td></tr>
						<tr>
							<td colspan=2 style="padding:8px 3px 5px 3px;border-top:1px dashed #bbbbbb">
								<table style=width:100%;table-layout:fixed cellpadding=0 cellspacing=0>
									<td style=width:52%>
										<div class=uploadDiv<?php if ($file[$i]["file"]) echo " style=background-color:#f7d7e4"; ?>>
											<img style=width:100%;height:100%;cursor:pointer;display:block;object-fit:cover;border-radius:5px src=<?php echo $file[$i]['path']."/".$file[$i]['file']; ?> onclick=window.open(src.replace('data/file/<?php echo $bo_table; ?>/','bbs/view_image.php?bo_table=<?php echo $bo_table; ?>&fn=')) onerror=parentElement.innerHTML='<?php echo $file[$i]['file'] ? "[일반파일]" : ""; ?>'>
										</div>
									</td>
									<td style=width:48% align=right valign=bottom><?php if ($file[$i]['file']) echo "<span style=color:#580ca3;font-weight:bold;cursor:pointer onclick=copyMode('".$file[$i]['path'].'/'.$file[$i]['file']."','파일주소가')>주소복사</span>"; ?></td>
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<?php if ($i % $file_width_limit == $file_width_limit - 1) echo "<div style=clear:both></div>" ?>
		<?php } ?>
		<div style=clear:both><input id=copyInput type=text style=display:none><audio id=copySound style=display:none src=<?php echo "$board_skin_url/file/copy_sound.mp3"; ?>></audio></div>
		<script>
		function copyMode() {
			copySound.play();
			copyInput.style.display = "block";
			copyInput.value = arguments[0];
			copyInput.select();
			document.execCommand("copy");
			copyInput.style.display = "none";
			alert(arguments[1] + " 복사되었습니다");
		}
		uploadClass = document.getElementsByClassName("uploadDiv");
		for (upd = 0; upd < uploadClass.length; upd++) uploadClass[upd].style.height = uploadClass[0].offsetWidth * <?php echo $file_hight_percent; ?> / 100 + "px";
		</script>
		<!--  파일업로드 박스형 종료 : wittazzurri -->

        <?php if ($is_use_captcha) { //자동등록방지 ?>
        <div class="write_div">
            <span class="sound_only">자동등록방지</span>
            <?php echo $captcha_html ?>
        </div>
        <?php } ?>
    </div>
	
	<!--  작성점검 버튼 시직 : wittazzurri -->
    <div class="btn_confirm" style="margin:10px 0px 0px 0px">
		<script>if (sessionStorage.returnWrite) sessionStorage.removeItem("returnWrite");</script>
		<table style=width:100%;table-layout:fixed cellpadding=0 cellspacing=0>
			<td><a href="<?php echo get_pretty_url($bo_table); ?>" class="btn_cancel" style=width:100%>취소</a></td>
			<td style=width:5px></td>
			<td><button class=btn_submit style=width:100%;background-color:#c00000 onclick=sessionStorage.returnWrite=1>작성점검</button></td>
			<td style=width:5px></td>
			<td><button type="submit" id="btn_submit" class="btn_submit" style=width:100% accesskey="s">작성완료</button></td>
		</table>
    </div>
	<!--  /작성점검 버튼 종료 : wittazzurri -->
	
    </form>
</section>

<script>
<?php if($write_min || $write_max) { ?>
// 글자수 제한
var char_min = parseInt(<?php echo $write_min; ?>); // 최소
var char_max = parseInt(<?php echo $write_max; ?>); // 최대
check_byte("wr_content", "char_count");

$(function() {
    $("#wr_content").on("keyup", function() {
        check_byte("wr_content", "char_count");
    });
});

<?php } ?>
function html_auto_br(obj)
{
    if (obj.checked) {
        result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
        if (result)
            obj.value = "html2";
        else
            obj.value = "html1";
    }
    else
        obj.value = "";
}

function fwrite_submit(f)
{
    <?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>

    var subject = "";
    var content = "";
    $.ajax({
        url: g5_bbs_url+"/ajax.filter.php",
        type: "POST",
        data: {
            "subject": f.wr_subject.value,
            "content": f.wr_content.value
        },
        dataType: "json",
        async: false,
        cache: false,
        success: function(data, textStatus) {
            subject = data.subject;
            content = data.content;
        }
    });

    if (subject) {
        alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
        f.wr_subject.focus();
        return false;
    }

    if (content) {
        alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
        if (typeof(ed_wr_content) != "undefined")
            ed_wr_content.returnFalse();
        else
            f.wr_content.focus();
        return false;
    }

    if (document.getElementById("char_count")) {
        if (char_min > 0 || char_max > 0) {
            var cnt = parseInt(check_byte("wr_content", "char_count"));
            if (char_min > 0 && char_min > cnt) {
                alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                return false;
            }
            else if (char_max > 0 && char_max < cnt) {
                alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                return false;
            }
        }
    }

    <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

    document.getElementById("btn_submit").disabled = "disabled";

    return true;
}

var uploadFile = $('.filebox .uploadBtn');
uploadFile.on('change', function(){
	if(window.FileReader){
		var filename = $(this)[0].files[0].name;
	} else {
		var filename = $(this).val().split('/').pop().split('\\').pop();
	}
	$(this).siblings('.fileName').val(filename);
});
</script>
