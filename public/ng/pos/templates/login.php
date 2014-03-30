<div tyro-nav></div>
<div class="css-login-container">
	<div class="tyro-login-flashdata"></br></div>
	<div class="row-fluid css-login">
		<h4>Login</h4>
		</br>
		<form ng-submit="tyro.login.login()">
			<label for="email">Email</label><input type="text" id="email" placeholder="email" ng-model="tyro.login.cred.email" required/>
			<label for="password">Password</label><input type="password" id="password" placeholder="password" ng-model="tyro.login.cred.password" required/><br>
			</br>
			<input type="submit" id="submit" value="Submit"/>
		</form>
	</div>
</div>