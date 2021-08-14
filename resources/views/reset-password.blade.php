@section('title', 'Reset Pasword')
    <x-login-layout>
        <div class="login-box">
            <div class="login-logo">
              <a href="../landing page/landing_page.html"><b>SISKePIP</b>Humbahas</a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
              <p class="login-box-msg"><b>Reset Kata Sandi</b></p>
              <form action="dashboard.html" method="post">
                <div class="form-group has-feedback">
                  <input type="text" class="form-control" placeholder="Email"/>
                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <input type="password" class="form-control" placeholder="Kata sandi baru"/>
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <input type="password" class="form-control" placeholder="Konfirmasi kata sandi baru"/>
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                  <div class="col-xs-4 box-footer clearfix">    
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Reset</button>
                  </div><!-- /.col -->
                </div>
              </form>
            </div><!-- /.login-box-body -->
          </div><!-- /.login-box -->
    </x-login-layout>