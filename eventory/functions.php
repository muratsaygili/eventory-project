<?php
/**
 * Created by PhpStorm.
 * User: Murat Saygılı
 * Date: 6.4.2016
 * Time: 14:27
 */

require_once "config.php";
$user = "";

if (array_key_exists ( "user", $_SESSION )) {
    $user = $_SESSION ['user'];

    $sql_user="SELECT * FROM uyeler WHERE uye_email='{$user}' ";
    $rsUser=mysqli_query($conn,$sql_user);
    $rowUser=mysqli_fetch_assoc($rsUser);

    $uye_id=$rowUser['uye_id']; //uyenin idsini alıyoruz,bütün sayfalarda mevcut oluyor
}
if ($user) {
    $flag=true;
}else{
    $flag=false;
}



function getHead($title = "empty"){
    return
        "
    <link rel=\"icon\" type=\"image/png\" href=\"images/201.png\" />
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

    <title>{$title}</title>

    <!-- Bootstrap -->
    <link href=\"../vendors/bootstrap/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <!-- Font Awesome -->
    <link href=\"../vendors/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\">
    <!-- iCheck -->
    <link href=\"../vendors/iCheck/skins/flat/green.css\" rel=\"stylesheet\">
    <!-- Datatables -->
    <link href=\"../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css\" rel=\"stylesheet\">

    <!-- Custom Theme Style -->
    <link href=\"css/custom.css\" rel=\"stylesheet\">
        ";
};


function getHeader(){
    global $flag;
    global $rowUser;
    if($flag){
        $text="
            <li class=\"\">
                  <a href=\"javascript:;\" class=\"user-profile dropdown-toggle\" data-toggle=\"dropdown\" aria-expanded=\"false\">
                    <img src=\"images/user.png\" alt=\"\">{$rowUser['uye_ad']}
                    <i class=\"fa fa-angle-down\"></i>
                  </a>
                  <ul class=\"dropdown-menu dropdown-usermenu pull-right\">
                    <li><a href=\"profile.php\">  Profilim</a>
                    </li>
                    <li>
                      <a href=\"profile.php\">Biletlerim
                      </a>
                    </li>
                    <li>
                      <a href=\"javascript:;\">Yardım</a>
                    </li>
                    <li><a href=\"logout.php\"><i class=\"fa fa-sign-out pull-right\"></i> Çıkış Yap</a>
                    </li>
                  </ul>
            </li>
            <li class=\"\">
                  <a href=\"create_event.php\" class=\"user-profile dropdown-toggle btn-info\" aria-expanded=\"false\">
                    <i class=\"glyphicon glyphicon-plus\"></i>&nbsp;&nbsp;Etkinlik Oluştur

                  </a>
            </li>

        ";
    }else{
        $text="
        <li class=\"\">
                  <a href=\"login.php\" class=\"user-profile dropdown-toggle\" aria-expanded=\"false\">
                    <i class=\"glyphicon glyphicon-log-in\"></i>&nbsp;&nbsp;Giriş Yap

                  </a>
                </li>
                <li class=\"\">
                  <a href=\"signup.php\" class=\"user-profile dropdown-toggle\" aria-expanded=\"false\">
                    <i class=\"glyphicon glyphicon-plus\"></i>&nbsp;&nbsp;Üye Ol

                  </a>
                </li>
        ";
    }


    return
    "
        <div class=\"top_nav\">
          <div class=\"nav_menu\">
            <nav class=\"\" role=\"navigation\">
              <div class=\"nav toggle\">
                <a id=\"menu_toggle\"><i class=\"fa fa-bars\"></i></a>
              </div>


              <ul class=\"nav navbar-nav navbar-right\">

                {$text}

                <!--
                <li role=\"presentation\" class=\"dropdown\" style=\"padding-top:6px\">
                  <a href=\"javascript:;\" class=\"dropdown-toggle info-number\" data-toggle=\"dropdown\" aria-expanded=\"false\">
                    <i class=\"fa fa-envelope-o\"></i>
                    <span class=\"badge bg-green\">1</span>
                  </a>
                  <ul id=\"menu1\" class=\"dropdown-menu list-unstyled msg_list\" role=\"menu\">
                    <li>
                      <a>
                        <span class=\"image\">
                            <img src=\"images/user.png\" alt=\"Profile Image\" />
                        </span>
                        <span>
                            <span>Kullanıcı</span>
                            <span class=\"time\">1 dakika önce</span>
                        </span>
                        <span class=\"message\">
                            X etkinliği biletiniz için son ödeme tarihi yarın. Biletinizi hemen alın...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class=\"text-center\">
                        <a>
                          <strong>Tümünü gör</strong>
                          <i class=\"fa fa-angle-right\"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
                -->
                  <div class=\"col-sm-4 form-group top_search pull-right\" style=\"padding-top:10px;\">
                  <form action='search_event.php' method='post'>
                      <div class=\"input-group\">
                          <input type=\"text\" name='etk_ad_ara' class=\"form-control\" placeholder=\"Etkinlik ara...\">
                        <span class=\"input-group-btn\">
                              <button class=\"btn btn-default\" type=\"submit\">Git!</button>
                          </span>
                      </div>
                  </form>
                  </div>
              </ul>

            </nav>
          </div>
        </div>
    ";
};

function getMenu(){
    global $flag;
    global $rowUser;
    if(!$flag){
        $text="Ziyaretçi";
    }else{
        $text=$rowUser['uye_ad'];
    }
    return
    "
          <div class=\"left_col scroll-view\">
            <div class=\"navbar nav_title\" style=\"border: 0;\">
              <a href=\"index.php\" class=\"site_title\"> <img src=\"images/201.png\" height='65px' width='60px'><span style=\"color: red;font-family:'Showcard Gothic'\">Eventory!</span></a>
            </div>

            <div class=\"clearfix\"></div>

            <!-- menu profile quick info -->
            <div class=\"profile\">
              <div class=\"profile_pic\">
                <a href='profile.php'><img src=\"images/user.png\" alt=\"...\" class=\"img-circle profile_img\"></a>
              </div>
              <div class=\"profile_info\">
                <span>Hoşgeldin,</span>
                <h2>{$text}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id=\"sidebar-menu\" class=\"main_menu_side hidden-print main_menu\">
              <div class=\"menu_section\">
                <h3>MENÜ</h3>
                <ul class=\"nav side-menu\">
                  <li><a href=\"index.php\"><i class=\"fa fa-home\"></i> Anasayfa </a>

                  </li>
                  <li><a><i class=\"fa fa-edit\"></i> Yaklaşan Etkinlikler <span class=\"fa fa-chevron-down\"></span><span class=\"label label-success pull-right\">Coming Soon</span></a>
                    <ul class=\"nav child_menu\">
                      <li><a href=\"example.php\">Boş Sayfa</a>
                      </li>
                      <li><a href=\"example.php\">Boş Sayfa</a>
                      </li>
                      <li><a href=\"example.php\">Boş Sayfa</a>
                      </li>
                      <li><a href=\"example.php\">Boş Sayfa</a>
                      </li>
                    </ul>
                  </li>
                  <li><a href='profile.php'><i class=\"fa fa-ticket\"></i> Biletlerim <span class=\"fa fa-chevron-down\"></span></a>

                  </li>
                  <li><a href=\"search_event.php\"><i class=\"fa fa-search\"></i> Etkinlik Ara </a>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class=\"sidebar-footer hidden-small\">
              <a data-toggle=\"tooltip\" data-placement=\"top\" title=\"\">
                <span class=\"glyphicon \" aria-hidden=\"true\"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
    ";

};

function getFooter(){
    return
    "
    <footer >
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-md-4\">
                        <h3><i class=\"glyphicon glyphicon-map-marker\"></i> İletişim:</h3>
                        <p class=\"footer-contact\">
                            Pamukkale University, Denizli, 20000, Turkey<br>
                            Phone: 0.258.000.0000 Fax: 0.258.000.0000<br>
                            Email: contact@eventory.com<br>
                        </p>
                    </div>
                    <div class=\"col-md-4\">
                        <h3><i class=\"glyphicon glyphicon-new-window\"></i> Bağlantılar</h3>
                        <p><a href=\"hakkimizda.php\"> Hakkımızda</a></p>
                        <p><a href=\"nedir.php\" >  Ne nedir,Ne yapar</a ></p >
                        <p><a href = \"iletisim.php\" > İletişim </a ></p >
                    </div >
                    <div class=\"col-md-4\">
                        <h3><i class=\"glyphicon glyphicon-heart fa fa-heart\"></i> Takip Et</h3>
                        <div id=\"social-icons\">
                            <a href=\"https://www.facebook.com\"  target=\"_blank\" class=\"btn-group facebook\">
                                <img src=\"images/btn_facebook.png\">
                            </a><br><br>
                            <a href=\"https://www.twitter.com\"  target=\"_blank\" class=\"btn-group twitter\">
                                <img src=\"images/btn_twitter.png\">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div style=\"background-color: black\" class=\"container\">
                <div class=\"copy text-center\">
                Copyright 2016 &copy <a href=\"index.php\">Eventory</a>
            </div>
      </div>
        <div class=\"clearfix\"></div>

        </footer>
        <!-- /footer content -->
      </div>
    </div>



    <!-- jQuery -->
    <script src=\"../vendors/jquery/dist/jquery.min.js\"></script>
    <!-- Bootstrap -->
    <script src=\"../vendors/bootstrap/dist/js/bootstrap.min.js\"></script>
    <!-- FastClick -->
    <script src=\"../vendors/fastclick/lib/fastclick.js\"></script>
    <!-- NProgress -->
    <script src=\"../vendors/nprogress/nprogress.js\"></script>
    <!-- jQuery Smart Wizard -->
    <script src=\"../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js\"></script>
    <!-- Custom Theme Scripts -->
    <script src=\"js/custom.js\"></script>
    <!-- Dropzone.js -->
    <script src=\"../vendors/dropzone/dist/min/dropzone.min.js\"></script>
    <!-- jquery.inputmask -->
    <script src=\"../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js\"></script>
     <!-- Datatables -->
    <script src=\"../vendors/datatables.net/js/jquery.dataTables.min.js\"></script>
    <script src=\"../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js\"></script>
    <script src=\"../vendors/datatables.net-buttons/js/dataTables.buttons.min.js\"></script>
    <script src=\"../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js\"></script>
    <script src=\"../vendors/datatables.net-buttons/js/buttons.flash.min.js\"></script>
    <script src=\"../vendors/datatables.net-buttons/js/buttons.html5.min.js\"></script>
    <script src=\"../vendors/datatables.net-buttons/js/buttons.print.min.js\"></script>
    <script src=\"../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js\"></script>
    <script src=\"../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js\"></script>
    <script src=\"../vendors/datatables.net-responsive/js/dataTables.responsive.min.js\"></script>
    <script src=\"../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js\"></script>
    <script src=\"../vendors/datatables.net-scroller/js/datatables.scroller.min.js\"></script>
    <script src=\"../vendors/jszip/dist/jszip.min.js\"></script>
    <script src=\"../vendors/pdfmake/build/pdfmake.min.js\"></script>
    <script src=\"../vendors/pdfmake/build/vfs_fonts.js\"></script>



    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($(\"#datatable-buttons\").length) {
            $(\"#datatable-buttons\").DataTable({
              dom: \"Bfrtip\",
              buttons: [
                {
                  extend: \"copy\",
                  className: \"btn-sm\"
                },
                {
                  extend: \"csv\",
                  className: \"btn-sm\"
                },
                {
                  extend: \"excel\",
                  className: \"btn-sm\"
                },
                {
                  extend: \"pdfHtml5\",
                  className: \"btn-sm\"
                },
                {
                  extend: \"print\",
                  className: \"btn-sm\"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          \"use strict\";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: \"js/datatables/json/scroller-demo.json\",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        var table = $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->


    <!-- jquery.inputmask -->
    <script>
      $(document).ready(function() {
        $(\":input\").inputmask();
      });
    </script>
    <!-- /jquery.inputmask -->


    <!-- jQuery Smart Wizard -->
    <script>
      $(document).ready(function() {
        $('#wizard').smartWizard();

        $('#wizard_verticle').smartWizard({
          transitionEffect: 'slide'
        });

        $('.buttonNext').addClass('btn btn-success');
        $('.buttonPrevious').addClass('btn btn-primary');
        $('.buttonFinish').addClass('btn btn-default');
      });
    </script>
    <!-- /jQuery Smart Wizard -->

  </body>
</html>
    ";
};

?>
