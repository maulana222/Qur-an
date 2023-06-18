 <?php $this->load->view('templates/header.php'); ?>
 

    <div class="container ">

        <!-- Outer Row -->
        <div class="row justify-content-center ">

            <div class="col-lg-6 ">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0  bg-primary">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                           
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-5">Hello admin</h1>
                                    </div>
                                 <?php if (isset($error_message)) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $error_message ?>
                                    </div>
                                <?php } ?>

                                    <form class="user" method="post" action="<?= site_url('Auth/')?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="email" aria-describedby="emailHelp" name="username"
                                                placeholder="Enter username ddress...">
                                            </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                            id="Password" placeholder="Password" name="password" >
                                            <?= form_error('password', '<small class="text-danger pl-4"> ,</small>')?>
                                        </div>
                                     
                                        <button type="submit" class="btn btn-warning btn-user btn-block">
                                            Login
                                        </button>
                                       
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    


    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url()?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url()?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>