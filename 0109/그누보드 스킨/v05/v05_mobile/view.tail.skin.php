<?php if (!defined("_GNUBOARD_")) exit; ?>

<!--  syntax highlight 옵션 시작 : wittazzurri -->
<link rel=stylesheet href=//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/styles/a11y-dark.min.css>
<script src=//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/highlight.min.js></script>
<style>
pre { position:relative; -ms-overflow-style:none; }
pre::-webkit-scrollbar { display:none; }
.codeButton { position:absolute; cursor:pointer; top:15px; right:15px; }
</style>
<script>
editorName = "<?php echo $board['bo_use_dhtml_editor'] ? $config['cf_editor'] : "none"; ?>";
function codeCopy() {
	copyText.style.display = "block";
	copyText.value = arguments[0].innerText.trim();
	copyText.select();
	document.execCommand("copy");
	copyText.style.display = "none";
	copySound.play();
	alert("COPY CODE!!!");
}
function hlMode() {
    this[arguments[0]].innerHTML = this[arguments[0]].innerHTML.replace(/\[code\]/gi, "<div class=_code_" + arguments[0] + ">").replace(/\[\/code\]/gi, "</div>");
    classN = document.getElementsByClassName("_code_" + arguments[0]);
    for (n = 0; n < classN.length; n++) {
        if (arguments[0] == "bo_v_con") {
            if (editorName == "none") changeCode = classN[n].innerHTML.replace(/\<br\>\<br\>/gi, "*br*").replace(/\<br\>/gi, "").replace(/\*br\*/gi, "<br>") + "<br>";
            else if (editorName == "cheditor5") changeCode = classN[n].innerHTML.replace(/<(\/p|p)([^>]*)>/gi, "") + "<br>";
			else changeCode = (classN[n].innerHTML.replace(/\<p\>/gi, "").replace(/\<\/p\>/gi, "<br>") + "<br>").replace(/\<br\>\<br\>/gi, "<br>");
        }
        else changeCode = classN[n].innerHTML.replace(/\<br\>\<br\>/gi, "*br*").replace(/\<br\>/gi, "").replace(/\*br\*/gi, "<br>") + "<br>"; 
        classN[n].innerHTML = "<pre><code>" + changeCode + "<span class=codeButton><img src=<?php echo "$board_skin_url/file/copy.png"; ?> onclick=codeCopy(parentElement.parentElement)></code></pre></span>";
    }
}
hlGroup = ["bo_v_con"];
for (vtc = 0; vtc < document.getElementsByClassName("cmt_contents").length; vtc++) {
	document.getElementsByClassName("cmt_contents")[vtc].id = "cmt_num_" + (Number(vtc) + 1);
	hlGroup.push(document.getElementsByClassName("cmt_contents")[vtc].id);
}
for (hl in hlGroup) hlMode(hlGroup[hl]);
hljs.initHighlighting();
document.write("<textarea id=copyText style=display:none></textarea>");
document.write("<audio id=copySound src=<?php echo "$board_skin_url/file/copy_sound.mp3"; ?>></audio>");
codeDiv = document.getElementsByTagName("div");
for (ncd = 0; ncd < codeDiv.length; ncd++) if (String(codeDiv[ncd].classList).indexOf("_code_") > -1) codeDiv[ncd].removeAttribute("class");
codeZone = document.getElementsByTagName("code");
for (cz = 0; cz < codeZone.length; cz++) {
	for (cza = 0; cza < codeZone[cz].getElementsByTagName("audio").length; cza++) codeZone[cz].getElementsByTagName("audio")[cza].innerHTML = "<span class=hljs-string>" + codeZone[cz].getElementsByTagName("audio")[cza].src + "</span>";
	for (czv = 0; czv < codeZone[cz].getElementsByTagName("video").length; czv++) codeZone[cz].getElementsByTagName("video")[czv].innerHTML = "<span class=hljs-string>" + codeZone[cz].getElementsByTagName("video")[czv].src + "</span>";
	for (czy = 0; czy < codeZone[cz].getElementsByTagName("iframe").length; czy++) codeZone[cz].getElementsByTagName("iframe")[czy].innerHTML = "<span class=hljs-string>https://youtu.be/" + codeZone[cz].getElementsByTagName("iframe")[czy].src.split("/")[4] + "</span>";
	codeZone[cz].innerHTML = codeZone[cz].innerHTML.replace(/<(\/audio|audio)([^>]*)>/gi, "");
	codeZone[cz].innerHTML = codeZone[cz].innerHTML.replace(/<(\/video|video)([^>]*)>/gi, "");
	codeZone[cz].innerHTML = codeZone[cz].innerHTML.replace(/<(\/iframe|iframe)([^>]*)>/gi, "");
	codeZone[cz].innerHTML = codeZone[cz].innerHTML.replace(/<(\/a|a)([^>]*)>/gi, "");
	codeZone[cz].style.fontSize = "1rem";
	codeZone[cz].style.fontFamily = "times";
	codeZone[cz].style.padding = "20px";
	codeZone[cz].style.borderRadius = "15px";
	codeZone[cz].style.backgroundColor = "#000000";
}
</script>
<!--  /syntax highlight 옵션 종료 : wittazzurri -->