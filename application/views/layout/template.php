<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?=base_url('assets/sneat')?>/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <title>Dashboard</title>
    <?php require_once('_css.php');?>
  </head>
  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
      <?php require_once('_sidebar.php');?>
        <!-- Layout container -->
        <div class="layout-page">
         <?php require_once('_navbar.php');?>
          <!-- Content wrapper -->
          <div class="content-wrapper">

            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <?php echo $contents;?>
            </div>
            <!-- / Content -->

            <?php require_once('_footer.php');?>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
      <!-- Overlay -->
    </div>
    <!-- / Layout wrapper -->
    <?php require_once('_js.php');?>
  </body>
</html>
