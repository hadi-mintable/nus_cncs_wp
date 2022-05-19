function keepPages(page){
	document.getElementById("pagenumber").value = page;
	var submit_btn = jQuery( '#search-submit' );
  submit_btn.click();
}


jQuery('.nus-quicklinks-container li a').attr('target','_blank');