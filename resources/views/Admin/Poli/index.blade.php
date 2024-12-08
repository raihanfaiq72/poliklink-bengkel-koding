<x-app-layout>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Validation</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Validation</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
    
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="quickForm">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      </div>
                      <div class="form-group mb-0">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                          <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->
                </div>
              <!--/.col (left) -->
              <!-- right column -->
              <div class="col-md-6">
    
              </div>
              <!--/.col (right) -->
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>

      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-edit"></i>
            SweetAlert2 Examples
          </h3>
        </div>
        <div class="card-body">
          <button type="button" class="btn btn-success swalDefaultSuccess">
            Launch Success Toast
          </button>
          <button type="button" class="btn btn-info swalDefaultInfo">
            Launch Info Toast
          </button>
          <button type="button" class="btn btn-danger swalDefaultError">
            Launch Error Toast
          </button>
          <button type="button" class="btn btn-warning swalDefaultWarning">
            Launch Warning Toast
          </button>
          <button type="button" class="btn btn-default swalDefaultQuestion">
            Launch Question Toast
          </button>
          <div class="text-muted mt-3">
            For more examples look at <a href="https://sweetalert2.github.io/">https://sweetalert2.github.io/</a>
          </div>
        </div>
        <!-- /.card -->
      </div>
</x-app-layout>