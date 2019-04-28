    <!-- BEGIN: Page Main-->
    <div id="main">
      <div class="row">
         <div id="breadcrumbs-wrapper" data-image="<?= base_url()?>assets/images/gallery/breadcrumb-bg.jpg">
            <!-- Search for small screen-->
            <div class="container">
               <div class="row">
                  <div class="col s12 m6 l6">
                     <h5 class="breadcrumbs-title mt-0 mb-0">Dashboard</h5>
                  </div>
                  <div class="col s12 m6 l6 right-align-md">

                  </div>
               </div>
            </div>
         </div>
        <div class="col s12">
          <div class="container">
            <div id="card-stats">
               <div class="row">
                  <div class="col s12 m6 l6 xl4">
                     <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
                        <div class="padding-4">
                           <div class="col s7 m7">
                              <i class="material-icons background-round mt-5">add_shopping_cart</i>
                              <p>Warehouses</p>
                           </div>
                           <div class="col s5 m5 right-align">
                              <h5 class="mb-0 white-text">6</h5>
                              <p class="no-margin">New</p>
                              <p>34</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col s12 m6 l6 xl4">
                     <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
                        <div class="padding-4">
                           <div class="col s7 m7">
                              <i class="material-icons background-round mt-5">perm_identity</i>
                              <p>Technicians</p>
                           </div>
                           <div class="col s5 m5 right-align">
                              <h5 class="mb-0 white-text">19</h5>
                              <p class="no-margin">New</p>
                              <p>400</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col s12 m6 l6 xl4">
                     <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">
                        <div class="padding-4">
                           <div class="col s7 m7">
                              <i class="material-icons background-round mt-5">settings_applications</i>
                              <p>Spares parts</p>
                           </div>
                           <div class="col s5 m5 right-align">
                              <h5 class="mb-0 white-text">80</h5>
                              <p class="no-margin">New</p>
                              <p>34,223</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="sales-chart">
               <div class="row">
                  <div class="col s12 m12 l12">
                     <div id="revenue-chart" class="card animate fadeUp">
                        <div class="card-content">
                           <h4 class="header mt-0"> Activity logs  <span class="purple-text small text-darken-1 ml-1"> </h4>
                           <div class="row">
                              <div class="col s12">
                                 <div class="yearly-revenue-chart">
                                    <canvas id="thisYearRevenue" class="firstShadow" height="350"></canvas>
                                    <canvas id="lastYearRevenue" height="350"></canvas>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END: Page Main-->