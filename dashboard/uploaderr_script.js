
 function trigger(x)
												 {
													 
													 var f = document.getElementById("file"+x+"");
													     f.click();
												 }
												 
												 
												 function uploadAsBase64(file,x) {

 
														var input = file;
													 
														
														if (input.files && input.files[0]) {
															var reader = new FileReader();

															reader.onload = function (e) 
															{
																console.log(x);
															 	 var pre = document.getElementById("pre"+x+"");
																 
															 	 var bs = document.getElementById("bs"+x+"");

																	pre.src=e.target.result;
																	
																	bs.value = e.target.result;
																	  uploader(x);
															}

															reader.readAsDataURL(input.files[0]);
														}
														
														 
													}

														function uploader(n)

														{
															
															 //  alert("running uploader");
															
																var fileInputElement  = document.getElementById("file"+n+"");
																
																
																  if (window.XMLHttpRequest) {
														// code for IE7+, Firefox, Chrome, Opera, Safari
														xmlhttp = new XMLHttpRequest();
													} else {
														// code for IE6, IE5
														xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
													}
													xmlhttp.onreadystatechange = function() {
														
														 
								 
													  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
													 
														           
														  // alert(xmlhttp.responseText);
																   
																   
																	}
														 
								
															}
							
 							
 
														var formData = new FormData(); 
														formData.append("status",status);  
														formData.append("program_image", fileInputElement.files[0]);
					 
						                                         
																xmlhttp.upload.addEventListener("progress", function(){ progressHandler(event,n); }, false);
																xmlhttp.addEventListener("load",function(){  completeHandler(event,n); }, false);
																xmlhttp.addEventListener("error",function(){  errorHandler(event,n); }, false);
																xmlhttp.addEventListener("abort", function(){ abortHandler(event,n); }, false);
																xmlhttp.open("POST", "uploaderr.php");
																xmlhttp.send(formData);
																
																
														}
											 
											 
								
 											   
														 
														 
														
														
														
														function _(el){
									return document.getElementById(el);
																}
																
																
														function progressHandler(event,n){
															
															_("progressBar"+n).style.visibility="visible";
															
											_("loaded_n_total"+n).innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
											var percent = (event.loaded / event.total) * 100;
											_("progressBar"+n).value = Math.round(percent);
											_("status"+n).innerHTML = Math.round(percent)+"% uploaded... please wait";
																					}
																					
																					
																function completeHandler(event,n){
																	
																	var resp = event.target.responseText.split("<[]>");
																	
																	_("status"+n).innerHTML=resp[0];
																	_("pre"+n).src=resp[1];
																 
																	
																	
																	_("bs"+n).value=resp[1];
																		
																	_("progressBar"+n).style.visibility="hidden";
																	_("progressBar"+n).value = 0;
																}
																
																 
																
																
															 
																
																function errorHandler(event,n){
																	_("status"+n).innerHTML = "Upload Failed";
																}
																function abortHandler(event,n){
																	_("status"+n).innerHTML = "Upload Aborted";
																}
