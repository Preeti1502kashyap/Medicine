
<!--header include-->
<?php include "include/header.php";
include "include/connectivity.php";
$id=$_GET['id'];
$s="select * from card  where id='$id'";
$exe1=mysqli_query($conn,$s);
$fetch=mysqli_fetch_array($exe1);
/*ending updation*/
if(isset($_POST['Submit'])){
	$name=$_POST['name'];/*agr naam length se jaada h tou usko trim kr deta h garbage value se issse memory kmm use hoti h*/
	$card=$_POST['card_no'];
	$exp=$_POST['exp'];
	$amount=$_POST['amount'];
	$cvv=$_POST['cvv'];
	$err=[];/*for error messages*/
	/*$err=$array(); writting error in two ways ek maine uppar likha h ek neeche*/
	if($name=="")
	{
		$err[0]="please enter first name";
	}
	elseif ($name<=3){
		$err[0]="please enter a valid name";
	}
	if($card=="")
	{
		$err[1]="please enter your card detail";
	}
	if($exp=="")
	{
		$err[2]="please enter your expiry date";
	}
	if($amount=="")
	{
		$err[3]="please enter an amount";
	}
	if($cvv=="")
	{
		$err[4]="please enter a cvv number";
	}
	/*counting a errors*/
	$c=count($err);
	if($c==0)
	{
		$insert="update card set name='$name',card_no='$card',exp='$exp',amount='$amount',cvv='$cvv' where id ='$id'";
		$exe= mysqli_query($conn,$insert);
		if($exe){
			echo "<script>alert('one record added');window.location='manageCard.php';</script>";
		
		}
		else
		{
			echo "<script>alert('error');</script>";
		}
	}
	
}

?>
        <div id="page-wrapper">
        <div class="graphs">
	     <div class="xs">
  	       <h3>Update Card Detail</h3>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" method="post">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Name</label>
									<div class="col-sm-8">
										<input type="text" name="name" class="form-control1" id="focusedinput" placeholder="Enter your name">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Card Number</label>
									<div class="col-sm-8">
										<input type="text" name="card_no" class="form-control1" id="focusedinput" placeholder="Enter your Card detail">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Expiry Date</label>
									<div class="col-sm-8">
										<input type="text" name="exp" class="form-control1" id="focusedinput" placeholder="Enter your Card detail">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Amount</label>
									<div class="col-sm-8">
										<input type="text" name="amount" class="form-control1" id="focusedinput" placeholder="Enter your Card detail">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">CVV</label>
									<div class="col-sm-8">
										<input type="text" name="cvv" class="form-control1" id="focusedinput" placeholder="Enter your Card detail">
									</div>
								</div>
									<div class="form-group">
										<input type="Submit" name="Submit" class="btn btn-success">
									</div>
									<!--<div class="col-sm-2">
										<p class="help-block">Your help text!</p>
									</div>
								</div>
								<div class="form-group">
									<label for="disabledinput" class="col-sm-2 control-label">Disabled Input</label>
									<div class="col-sm-8">
										<input disabled="" type="text" class="form-control1" id="disabledinput" placeholder="Disabled Input">
									</div>
								</div>
								<div class="form-group">
									<label for="inputPassword" class="col-sm-2 control-label">Password</label>
									<div class="col-sm-8">
										<input type="password" class="form-control1" id="inputPassword" placeholder="Password">
									</div>
								</div>
								<div class="form-group">
									<label for="checkbox" class="col-sm-2 control-label">Checkbox</label>
									<div class="col-sm-8">
										<div class="checkbox-inline1"><label><input type="checkbox"> Unchecked</label></div>
										<div class="checkbox-inline1"><label><input type="checkbox" checked=""> Checked</label></div>
										<div class="checkbox-inline1"><label><input type="checkbox" disabled=""> Disabled Unchecked</label></div>
										<div class="checkbox-inline1"><label><input type="checkbox" disabled="" checked=""> Disabled Checked</label></div>
									</div>
								</div>
								<div class="form-group">
									<label for="checkbox" class="col-sm-2 control-label">Checkbox Inline</label>
									<div class="col-sm-8">
										<div class="checkbox-inline"><label><input type="checkbox"> Unchecked</label></div>
										<div class="checkbox-inline"><label><input type="checkbox" checked=""> Checked</label></div>
										<div class="checkbox-inline"><label><input type="checkbox" disabled=""> Disabled Unchecked</label></div>
										<div class="checkbox-inline"><label><input type="checkbox" disabled="" checked=""> Disabled Checked</label></div>
									</div>
								</div>
								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Dropdown Select</label>
									<div class="col-sm-8"><select name="selector1" id="selector1" class="form-control1">
										<option>Lorem ipsum dolor sit amet.</option>
										<option>Dolore, ab unde modi est!</option>
										<option>Illum, fuga minus sit eaque.</option>
										<option>Consequatur ducimus maiores voluptatum minima.</option>
									</select></div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Multiple Select</label>
									<div class="col-sm-8">
										<select multiple="" class="form-control1">
											<option>Option 1</option>
											<option>Option 2</option>
											<option>Option 3</option>
											<option>Option 4</option>
											<option>Option 5</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="txtarea1" class="col-sm-2 control-label">Textarea</label>
									<div class="col-sm-8"><textarea name="txtarea1" id="txtarea1" cols="50" rows="4" class="form-control1"></textarea></div>
								</div>
								<div class="form-group">
									<label for="radio" class="col-sm-2 control-label">Radio</label>
									<div class="col-sm-8">
										<div class="radio block"><label><input type="radio"> Unchecked</label></div>
										<div class="radio block"><label><input type="radio" checked=""> Checked</label></div>
										<div class="radio block"><label><input type="radio" disabled=""> Disabled Unchecked</label></div>
										<div class="radio block"><label><input type="radio" disabled="" checked=""> Disabled Checked</label></div>
									</div>
								</div>
								<div class="form-group">
									<label for="radio" class="col-sm-2 control-label">Radio Inline</label>
									<div class="col-sm-8">
										<div class="radio-inline"><label><input type="radio"> Unchecked</label></div>
										<div class="radio-inline"><label><input type="radio" checked=""> Checked</label></div>
										<div class="radio-inline"><label><input type="radio" disabled=""> Disabled Unchecked</label></div>
										<div class="radio-inline"><label><input type="radio" disabled="" checked=""> Disabled Checked</label></div>
									</div>
								</div>
								<div class="form-group">
									<label for="smallinput" class="col-sm-2 control-label label-input-sm">Small Input</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1 input-sm" id="smallinput" placeholder="Small Input">
									</div>
								</div>
								<div class="form-group">
									<label for="mediuminput" class="col-sm-2 control-label">Medium Input</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="mediuminput" placeholder="Medium Input">
									</div>
								</div>
								<div class="form-group mb-n">
									<label for="largeinput" class="col-sm-2 control-label label-input-lg">Large Input</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1 input-lg" id="largeinput" placeholder="Large Input">
									</div>
								</div>-->
							</form>
						</div>
					</div>
					
					<!--<div class="bs-example" data-example-id="form-validation-states">
    <form>
      <div class="form-group has-success">
        <label class="control-label" for="inputSuccess1">Input with success</label>
        <input type="text" class="form-control1" id="inputSuccess1">
      </div>
      <div class="form-group has-warning">
        <label class="control-label" for="inputWarning1">Input with warning</label>
        <input type="text" class="form-control1" id="inputWarning1">
      </div>
      <div class="form-group has-error">
        <label class="control-label" for="inputError1">Input with error</label>
        <input type="text" class="form-control1" id="inputError1">
      </div>
    </form>
  </div>
  <div class="panel-body">
					<form role="form" class="form-horizontal">
						<div class="form-group">
							<label class="col-md-2 control-label">Email Address</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-envelope-o"></i>
									</span>
									<input type="text" class="form-control1" placeholder="Email Address">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Password</label>
							<div class="col-md-8">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-key"></i>
									</span>
									<input type="password" class="form-control1" id="exampleInputPassword1" placeholder="Password">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Email Address</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<i class="fa fa-envelope-o"></i>
									</span>
									<input id="email" class="form-control1" type="text" placeholder="Email Address">
								</div>
							</div>
							<div class="col-sm-2">
								<p class="help-block">With tooltip</p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Password</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<i class="fa fa-key"></i>
									</span>
									<input type="password" class="form-control1" placeholder="Password">
								</div>
							</div>
							<div class="col-sm-2">
								<p class="help-block">With tooltip</p>
							</div>
						</div>
						<div class="form-group has-success">
							<label class="col-md-2 control-label">Input Addon Success</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<i class="fa fa-envelope-o"></i>
									</span>
								    <input id="email" class="form-control1" type="text" placeholder="Email Address">
								</div>
							</div>
							<div class="col-sm-2">
								<p class="help-block">Email is valid!</p>
							</div>
						</div>
						<div class="form-group has-error">
							<label class="col-md-2 control-label">Input Addon Error</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<i class="fa fa-key"></i>
									</span>
									<input type="password" class="form-control1" placeholder="Password">
								</div>
							</div>
							<div class="col-sm-2">
								<p class="help-block">Error!</p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Checkbox Addon</label>
							<div class="col-md-8">
								<div class="input-group">
									<div class="input-group-addon"><input type="checkbox"></div>
									<input type="text" class="form-control1">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Checkbox Addon</label>
							<div class="col-md-8">
								<div class="input-group">
									<input type="text" class="form-control1">
									<div class="input-group-addon"><input type="checkbox"></div>
									
								</div>
							</div>
							<div class="col-sm-2">
								<p class="help-block">Checkbox on right</p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Radio Addon</label>
							<div class="col-md-8">
								<div class="input-group">
									<div class="input-group-addon"><input type="radio"></div>
									<input type="text" class="form-control1">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Radio Addon</label>
							<div class="col-md-8">
								<div class="input-group">
									<input type="text" class="form-control1">
									<div class="input-group-addon"><input type="radio"></div>
									
								</div>
							</div>
							<div class="col-sm-2">
								<p class="help-block">Radio on right</p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Input Processing</label>
							<div class="col-md-8">
								<div class="input-icon right spinner">
									<i class="fa fa-fw fa-spin fa-spinner"></i>
									<input id="email" class="form-control1" type="text" placeholder="Processing...">
								</div>
							</div>
							<div class="col-sm-2">
								<p class="help-block">Processing right</p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Static Paragraph</label>
							<div class="col-md-8">
								<p class="form-control1 m-n">email@example.com</p>
							</div>
						</div>
						<div class="form-group mb-n">
							<label class="col-md-2 control-label">Readonly</label>
							<div class="col-md-8">
								<input type="text" class="form-control1" placeholder="Readonly" readonly="">
							</div>
						</div>
					</form>
	</div>
	<div class="bs-example" data-example-id="form-validation-states-with-icons">
    <form>
      <div class="form-group has-success has-feedback">
        <label class="control-label" for="inputSuccess2">Input with success</label>
        <input type="text" class="form-control1" id="inputSuccess2" aria-describedby="inputSuccess2Status">
        <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
        <span id="inputSuccess2Status" class="sr-only">(success)</span>
      </div>
      <div class="form-group has-warning has-feedback">
        <label class="control-label" for="inputWarning2">Input with warning</label>
        <input type="text" class="form-control1" id="inputWarning2" aria-describedby="inputWarning2Status">
        <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
        <span id="inputWarning2Status" class="sr-only">(warning)</span>
      </div>
      <div class="form-group has-error has-feedback">
        <label class="control-label" for="inputError2">Input with error</label>
        <input type="text" class="form-control1" id="inputError2" aria-describedby="inputError2Status">
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <span id="inputError2Status" class="sr-only">(error)</span>
      </div>
      <div class="form-group has-success has-feedback">
        <label class="control-label" for="inputGroupSuccess1">Input group with success</label>
        <div class="input-group">
          <span class="input-group-addon">@</span>
          <input type="text" class="form-control1" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status">
        </div>
        <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
        <span id="inputGroupSuccess1Status" class="sr-only">(success)</span>
      </div>
      <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" id="exampleInputFile">
        <p class="help-block">Example block-level help text here.</p>
      </div>
      <div class="panel-footer">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<button class="btn-success btn">Submit</button>
				<button class="btn-default btn">Cancel</button>
				<button class="btn-inverse btn">Reset</button>
			</div>
		</div>
	 </div>
    </form>
  </div>
  </div>-->
  <!--include footer-->
  <?php include "include/footer.php";?>