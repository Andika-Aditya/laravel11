<!DOCTYPE html>
<html>
<x-head-admin-home>
  <x-slot:title>
    {{ $title }}
  </x-slot:title>
</x-head-admin-home>
<body class="hold-transition login-page bg-blue-linear">
	<div class="login-box">
		<div class="login-logo bg-white">
      Login <b class="fw-500">Admin</b>
      <div class="card">	
        <div class="card-body login-card-body">
          <form action="#" method="#">
            <div class="input-group mb-3 rounded-border">
              <input type="text" name="username" class="form-control" placeholder="Username" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3 rounded-border">	 
              <input type="password" name="password" class="form-control" placeholder="Password" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <button type="submit" class="btn btn-primary btn-lg btn-block clickable-gradient">Login</button>
            </div>	
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <!-- jQuery -->
  <script src="/assetsBS/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/assetsBS/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/assetsBS/dist/js/adminlte.min.js"></script>

</body>
</html>