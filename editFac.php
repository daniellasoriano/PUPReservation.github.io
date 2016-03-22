											<div class = "modal-content" style ="width:600px; left: 30px;">
											<!--header-->
													<div class = "modal-header" style="background:#f0f5f5;">
														<button type = "button" class = "close" data-dismiss = "modal">&times;</button>
														<h3 class = "modal-title">Update Facility</h3>
													</div>
											<!--TABLE-->
											<div>
											<?php 
											  require('connection.php');
											  $id = 3;
											  $getselect=mysqli_query($con, "SELECT * FROM tblFacility WHERE intFacilityID = '$id'");
											  while($row=mysqli_fetch_array($getselect))
											  {
												$facName=$row['strFacilityName'];
												$facDesc=$row['strFacilityDesc'];
												$facLoc=$row['strFacilityLoc'];
												$status=$row['strFacilityStatus'];
											?>
											<form method = 'POST' action = 'editFacility.php'>
													<div class="container" style ="width:600px">
													<div class="table-responsive"> 
										

													<label>Name of Facility:</label>
													<input required name="name" type="text" class="form-control" placeholder=<?php echo "$facName" ?> >
													<label>Description</label>
													<textarea name="desc" class="form-control" rows="5" placeholder=<?php echo "$facDesc" ?> id= "desc"></textarea>
													<label>Location:</label>
													<input required name="loc" type ="text" class="form-control" placeholder=<?php echo "$facLoc" ?> id = "loc">
													<label>Status:</label>
													<div class="input-group">
													  <span class="input-group-addon">
														Active <input type="radio" checked value = "Active" name="status">
														Inactive <input type="radio" value = "Inactive" name="status">
													</div><!-- /input-group -->
													<br>
													<br>
											
													<div class="form-group"> 
																
																<div class="inline text-center ">
																
																	<button type="submit" class="btn btn-primary" name="btnEdit">
																	<span class="glyphicon glyphicon-ok"></span> Sumbit
																
																	<button type="cancel" class="btn btn-primary">
																	<span class="glyphicon glyphicon-remove"></span> Cancel
																
																</div>
												
													</div>
													</div>
													</div>
													
												
												</form>
												
											<?php }  ?>
											<script type="text/javascript" src="./js/jquery-2.1.1.min.js"></script>
											<script type="text/javascript" src="./js/bootstrap.js"></script>
											<script type="text/javascript">
												$(document).ready(function(){
													// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
													$('.modal-trigger').leanModal();
												  });
														 
											</script>
											</div>
											</div>
									</div>
							</div>	
					</div>
   </div>
   </div>
   </div>
   </div>