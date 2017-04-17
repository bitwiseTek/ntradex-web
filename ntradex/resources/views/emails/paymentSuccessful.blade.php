<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<title>Transaction Successful</title>
	</head>
		<body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;">
			<div style="padding:10px; background:#333; font-size:19px; color:#CCC;">
			 Ntradex Transaction Successful
			</div>

			<div style="padding:24px; font-size:13px;">
				<span style="font-weight:bold">{{$last_name}} {{$first_name}}</span>, 
					Congratulations!! Your transaction was successful, observe transaction details below;
				<p>
					<div>
						<span style="font-weight:bold">Transaction Reference Number: </span>{{$ref_no}}
					</div>
					<div>
						<span style="font-weight:bold">Amount: </span>N{{number_format($amount, 2)}}
					</div>
				</p>

				<p>
					<div>
						<span style="font-weight:bold">So what next?</span>
					</div>
					<div>
						Start by learning the entire process step-by-step <a href="https://web.ntradex.com/how-it-works">Ntradex Guide.</a>
					</div>
				</p>
			</div>

			<p><span style="font-weight:bold">Ntradex Team.</span></p>
	</body>
</html>