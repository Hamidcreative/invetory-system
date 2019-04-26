    <!-- BEGIN: Page Main-->
    <div id="main">
      <div class="row">
        <div class="col s12">
          <div class="container">
            <!--card stats start-->
            <div id="card-stats">
               <div class="row">
                  <div class="col s12 m6 l6 xl3">
                     <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
                        <div class="padding-4">
                           <div class="col s7 m7">
                              <i class="material-icons background-round mt-5">add_shopping_cart</i>
                              <p>Orders</p>
                           </div>
                           <div class="col s5 m5 right-align">
                              <h5 class="mb-0 white-text">690</h5>
                              <p class="no-margin">New</p>
                              <p>6,00,00</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col s12 m6 l6 xl3">
                     <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
                        <div class="padding-4">
                           <div class="col s7 m7">
                              <i class="material-icons background-round mt-5">perm_identity</i>
                              <p>Clients</p>
                           </div>
                           <div class="col s5 m5 right-align">
                              <h5 class="mb-0 white-text">1885</h5>
                              <p class="no-margin">New</p>
                              <p>1,12,900</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col s12 m6 l6 xl3">
                     <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
                        <div class="padding-4">
                           <div class="col s7 m7">
                              <i class="material-icons background-round mt-5">timeline</i>
                              <p>Sales</p>
                           </div>
                           <div class="col s5 m5 right-align">
                              <h5 class="mb-0 white-text">80%</h5>
                              <p class="no-margin">Growth</p>
                              <p>3,42,230</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col s12 m6 l6 xl3">
                     <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">
                        <div class="padding-4">
                           <div class="col s7 m7">
                              <i class="material-icons background-round mt-5">attach_money</i>
                              <p>Profit</p>
                           </div>
                           <div class="col s5 m5 right-align">
                              <h5 class="mb-0 white-text">$890</h5>
                              <p class="no-margin">Today</p>
                              <p>$25,000</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--card stats end-->
            <!--yearly & weekly revenue chart start-->
            <div id="sales-chart">
               <div class="row">
                  <div class="col s12 m8 l8">
                     <div id="revenue-chart" class="card animate fadeUp">
                        <div class="card-content">
                           <h4 class="header mt-0">
                              REVENUE FOR 2017
                              <span class="purple-text small text-darken-1 ml-1">
                                 <i class="material-icons">keyboard_arrow_up</i> 15.58 %</span>
                              <a class="waves-effect waves-light btn gradient-45deg-purple-deep-orange gradient-shadow right">Details</a>
                           </h4>
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
                  <div class="col s12 m4 l4">
                     <div id="weekly-earning" class="card animate fadeUp">
                        <div class="card-content">
                           <h4 class="header m-0">Earning <i class="material-icons right grey-text lighten-3">more_vert</i></h4>
                           <p class="no-margin grey-text lighten-3 medium-small">Mon 15 - Sun 21</p>
                           <h3 class="header">$899.39 <i class="material-icons deep-orange-text text-accent-2">arrow_upward</i></h3>
                           <canvas id="monthlyEarning" class="" height="150"></canvas>
                           <div class="center-align">
                              <p class="lighten-3">Total Weekly Earning</p>
                              <a class="waves-effect waves-light btn gradient-45deg-purple-deep-orange gradient-shadow">View Full</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--yearly & weekly revenue chart end-->
            <!-- Member online, Currunt Server load & Today's Revenue Chart start -->
            <div id="daily-data-chart">
               <div class="row">
                  <div class="col s12 m4 l4">
                     <div class="card pt-0 pb-0 animate fadeLeft">
                        <div class="padding-2 ml-2">
                           <span class="new badge gradient-45deg-light-blue-cyan gradient-shadow mt-2 mr-2">+ 42.6%</span>
                           <p class="mt-2 mb-0">Members online</p>
                           <p class="no-margin grey-text lighten-3">360 avg</p>
                           <h5>3,450</h5>
                        </div>
                        <div class="row">
                           <div class="sample-chart-wrapper" style="margin-bottom: -14px; margin-top: -75px;">
                              <canvas id="custom-line-chart-sample-one" class="center"></canvas>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col s12 m4 l4 animate fadeUp">
                     <div class="card pt-0 pb-0">
                        <div class="padding-2 ml-2">
                           <span class="new badge gradient-45deg-purple-deep-orange gradient-shadow mt-2 mr-2">+ 12%</span>
                           <p class="mt-2 mb-0">Current server load</p>
                           <p class="no-margin grey-text lighten-3">23.1% avg</p>
                           <h5>+2500</h5>
                        </div>
                        <div class="row">
                           <div class="sample-chart-wrapper" style="margin-bottom: -14px; margin-top: -75px;">
                              <canvas id="custom-line-chart-sample-two" class="center"></canvas>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col s12 m4 l4">
                     <div class="card pt-0 pb-0 animate fadeRight">
                        <div class="padding-2 ml-2">
                           <span class="new badge gradient-45deg-amber-amber gradient-shadow mt-2 mr-2">+ $900</span>
                           <p class="mt-2 mb-0">Today's revenue</p>
                           <p class="no-margin grey-text lighten-3">$40,512 avg</p>
                           <h5>$ 22,300</h5>
                        </div>
                        <div class="row">
                           <div class="sample-chart-wrapper" style="margin-bottom: -14px; margin-top: -75px;">
                              <canvas id="custom-line-chart-sample-three" class="center"></canvas>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Member online, Currunt Server load & Today's Revenue Chart start -->
            <!-- ecommerce product start-->
            <div id="ecommerce-product">
               <div class="row">
                  <div class="col s12 m4">
                     <div class="card animate fadeLeft">
                        <div class="card-content  center">
                           <h6 class="card-title font-weight-400 mb-0">Apple Watch</h6>
                           <img src="../../../assets/images/cards/watch.png" alt="" class="responsive-img" />
                           <p><b>The Apple Watch</b></p>
                           <p>One day only exclusive sale on our marketplace</p>
                        </div>
                        <div class="card-action border-non center">
                           <a class="waves-effect waves-light btn gradient-45deg-light-blue-cyan box-shadow">$ 999/-</a>
                        </div>
                     </div>
                  </div>
                  <div class="col s12 m4">
                     <div class="card animate fadeUp">
                        <div class="card-content">
                           <span class="card-title center-align">Music</span>
                           <img src="../../../assets/images/cards/headphones-2.png" alt="" class="responsive-img" />
                        </div>
                        <div class="card-action pt-0">
                           <p class="">Default Quality</p>
                           <div class="chip">192kb <i class="close material-icons">close</i></div>
                           <div class="chip">320kb <i class="close material-icons">close</i></div>
                        </div>
                        <div class="card-action pt-0">
                           <p class="">Save Video Quality</p>
                           <div class="switch">
                              <label> Off <input type="checkbox" /> <span class="lever"></span> On </label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col s12 m4">
                     <div class="card animate fadeRight">
                        <div class="card-content center">
                           <h6 class="card-title font-weight-400 mb-0">iPhone</h6>
                           <img src="../../../assets/images/cards/iphonec.png" alt="" class="responsive-img" />
                           <p><b>The Apple iPhone X</b></p>
                           <p>One day only exclusive sale on our marketplace</p>
                        </div>
                        <div class="card-action border-non center">
                           <a class="waves-effect waves-light btn gradient-45deg-red-pink box-shadow">$ 299/-</a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- ecommerce product end-->
               <!-- ecommerce offers start-->
               <div id="ecommerce-offer">
                  <div class="row">
                     <div class="col s12 m3">
                        <div class="card gradient-shadow gradient-45deg-light-blue-cyan border-radius-3 animate fadeUp">
                           <div class="card-content center">
                              <img src="../../../assets/images/icon/apple-watch.png" class="width-40 border-round z-depth-5"
                                 alt="" class="responsive-img" />
                              <h5 class="white-text lighten-4">50% Off</h5>
                              <p class="white-text lighten-4">On apple watch</p>
                           </div>
                        </div>
                     </div>
                     <div class="col s12 m3">
                        <div class="card gradient-shadow gradient-45deg-red-pink border-radius-3 animate fadeUp">
                           <div class="card-content center">
                              <img src="../../../assets/images/icon/printer.png" class="width-40 border-round z-depth-5" alt=""
                                 class="responsive-img" />
                              <h5 class="white-text lighten-4">20% Off</h5>
                              <p class="white-text lighten-4">On Canon Printer</p>
                           </div>
                        </div>
                     </div>
                     <div class="col s12 m3">
                        <div class="card gradient-shadow gradient-45deg-amber-amber border-radius-3 animate fadeUp">
                           <div class="card-content center">
                              <img src="../../../assets/images/icon/laptop.png" class="width-40 border-round z-depth-5" alt=""
                                 class="responsive-img" />
                              <h5 class="white-text lighten-4">40% Off</h5>
                              <p class="white-text lighten-4">On apple macbook</p>
                           </div>
                        </div>
                     </div>
                     <div class="col s12 m3">
                        <div class="card gradient-shadow gradient-45deg-green-teal border-radius-3 animate fadeUp">
                           <div class="card-content center">
                              <img src="../../../assets/images/icon/bowling.png" class="width-40 border-round z-depth-5" alt=""
                                 class="responsive-img" />
                              <h5 class="white-text lighten-4">60% Off</h5>
                              <p class="white-text lighten-4">On any game</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- ecommerce offers end-->
               <!-- //////////////////////////////////////////////////////////////////////////// -->
            </div>
            <!--end container--><!-- START RIGHT SIDEBAR NAV -->
            <aside id="right-sidebar-nav">
               <div id="slide-out-right" class="slide-out-right-sidenav sidenav rightside-navigation">
                  <div class="row">
                     <div class="slide-out-right-title">
                        <div class="col s12 border-bottom-1 pb-0 pt-1">
                           <div class="row">
                              <div class="col s2 pr-0 center">
                                 <i class="material-icons vertical-text-middle"><a href="#" class="sidenav-close">clear</a></i>
                              </div>
                              <div class="col s10 pl-0">
                                 <ul class="tabs">
                                    <li class="tab col s4 p-0">
                                       <a href="#messages" class="active">
                                          <span>Messages</span>
                                       </a>
                                    </li>
                                    <li class="tab col s4 p-0">
                                       <a href="#settings">
                                          <span>Settings</span>
                                       </a>
                                    </li>
                                    <li class="tab col s4 p-0">
                                       <a href="#activity">
                                          <span>Activity</span>
                                       </a>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="slide-out-right-body">
                        <div id="messages" class="col s12">
                           <div class="collection border-none">
                              <input class="header-search-input mt-4 mb-2" type="text" name="Search" placeholder="Search Messages" />
                              <ul class="collection p-0">
                                 <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                    <span class="avatar-status avatar-online avatar-50"
                                       ><img src="../../../assets/images/avatar/avatar-7.png" alt="avatar" />
                                       <i></i>
                                    </span>
                                    <div class="user-content">
                                       <h6 class="line-height-0">Elizabeth Elliott</h6>
                                       <p class="medium-small blue-grey-text text-lighten-3 pt-3">Thank you</p>
                                    </div>
                                    <span class="secondary-content medium-small">5.00 AM</span>
                                 </li>
                                 <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                    <span class="avatar-status avatar-online avatar-50"
                                       ><img src="../../../assets/images/avatar/avatar-1.png" alt="avatar" />
                                       <i></i>
                                    </span>
                                    <div class="user-content">
                                       <h6 class="line-height-0">Mary Adams</h6>
                                       <p class="medium-small blue-grey-text text-lighten-3 pt-3">Hello Boo</p>
                                    </div>
                                    <span class="secondary-content medium-small">4.14 AM</span>
                                 </li>
                                 <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                    <span class="avatar-status avatar-off avatar-50"
                                       ><img src="../../../assets/images/avatar/avatar-2.png" alt="avatar" />
                                       <i></i>
                                    </span>
                                    <div class="user-content">
                                       <h6 class="line-height-0">Caleb Richards</h6>
                                       <p class="medium-small blue-grey-text text-lighten-3 pt-3">Hello Boo</p>
                                    </div>
                                    <span class="secondary-content medium-small">4.14 AM</span>
                                 </li>
                                 <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                    <span class="avatar-status avatar-online avatar-50"
                                       ><img src="../../../assets/images/avatar/avatar-3.png" alt="avatar" />
                                       <i></i>
                                    </span>
                                    <div class="user-content">
                                       <h6 class="line-height-0">Caleb Richards</h6>
                                       <p class="medium-small blue-grey-text text-lighten-3 pt-3">Keny !</p>
                                    </div>
                                    <span class="secondary-content medium-small">9.00 PM</span>
                                 </li>
                                 <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                    <span class="avatar-status avatar-online avatar-50"
                                       ><img src="../../../assets/images/avatar/avatar-4.png" alt="avatar" />
                                       <i></i>
                                    </span>
                                    <div class="user-content">
                                       <h6 class="line-height-0">June Lane</h6>
                                       <p class="medium-small blue-grey-text text-lighten-3 pt-3">Ohh God</p>
                                    </div>
                                    <span class="secondary-content medium-small">4.14 AM</span>
                                 </li>
                                 <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                    <span class="avatar-status avatar-off avatar-50"
                                       ><img src="../../../assets/images/avatar/avatar-5.png" alt="avatar" />
                                       <i></i>
                                    </span>
                                    <div class="user-content">
                                       <h6 class="line-height-0">Edward Fletcher</h6>
                                       <p class="medium-small blue-grey-text text-lighten-3 pt-3">Love you</p>
                                    </div>
                                    <span class="secondary-content medium-small">5.15 PM</span>
                                 </li>
                                 <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                    <span class="avatar-status avatar-online avatar-50"
                                       ><img src="../../../assets/images/avatar/avatar-6.png" alt="avatar" />
                                       <i></i>
                                    </span>
                                    <div class="user-content">
                                       <h6 class="line-height-0">Crystal Bates</h6>
                                       <p class="medium-small blue-grey-text text-lighten-3 pt-3">Can we</p>
                                    </div>
                                    <span class="secondary-content medium-small">8.00 AM</span>
                                 </li>
                                 <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                    <span class="avatar-status avatar-off avatar-50"
                                       ><img src="../../../assets/images/avatar/avatar-7.png" alt="avatar" />
                                       <i></i>
                                    </span>
                                    <div class="user-content">
                                       <h6 class="line-height-0">Nathan Watts</h6>
                                       <p class="medium-small blue-grey-text text-lighten-3 pt-3">Great!</p>
                                    </div>
                                    <span class="secondary-content medium-small">9.53 PM</span>
                                 </li>
                                 <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                    <span class="avatar-status avatar-off avatar-50"
                                       ><img src="../../../assets/images/avatar/avatar-8.png" alt="avatar" />
                                       <i></i>
                                    </span>
                                    <div class="user-content">
                                       <h6 class="line-height-0">Willard Wood</h6>
                                       <p class="medium-small blue-grey-text text-lighten-3 pt-3">Do it</p>
                                    </div>
                                    <span class="secondary-content medium-small">4.20 AM</span>
                                 </li>
                                 <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                    <span class="avatar-status avatar-online avatar-50"
                                       ><img src="../../../assets/images/avatar/avatar-1.png" alt="avatar" />
                                       <i></i>
                                    </span>
                                    <div class="user-content">
                                       <h6 class="line-height-0">Ronnie Ellis</h6>
                                       <p class="medium-small blue-grey-text text-lighten-3 pt-3">Got that</p>
                                    </div>
                                    <span class="secondary-content medium-small">5.20 AM</span>
                                 </li>
                                 <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                    <span class="avatar-status avatar-online avatar-50"
                                       ><img src="../../../assets/images/avatar/avatar-9.png" alt="avatar" />
                                       <i></i>
                                    </span>
                                    <div class="user-content">
                                       <h6 class="line-height-0">Daniel Russell</h6>
                                       <p class="medium-small blue-grey-text text-lighten-3 pt-3">Thank you</p>
                                    </div>
                                    <span class="secondary-content medium-small">12.00 AM</span>
                                 </li>
                                 <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                    <span class="avatar-status avatar-off avatar-50"
                                       ><img src="../../../assets/images/avatar/avatar-10.png" alt="avatar" />
                                       <i></i>
                                    </span>
                                    <div class="user-content">
                                       <h6 class="line-height-0">Sarah Graves</h6>
                                       <p class="medium-small blue-grey-text text-lighten-3 pt-3">Okay you</p>
                                    </div>
                                    <span class="secondary-content medium-small">11.14 PM</span>
                                 </li>
                                 <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                    <span class="avatar-status avatar-off avatar-50"
                                       ><img src="../../../assets/images/avatar/avatar-11.png" alt="avatar" />
                                       <i></i>
                                    </span>
                                    <div class="user-content">
                                       <h6 class="line-height-0">Andrew Hoffman</h6>
                                       <p class="medium-small blue-grey-text text-lighten-3 pt-3">Can do</p>
                                    </div>
                                    <span class="secondary-content medium-small">7.30 PM</span>
                                 </li>
                                 <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                                    <span class="avatar-status avatar-online avatar-50"
                                       ><img src="../../../assets/images/avatar/avatar-12.png" alt="avatar" />
                                       <i></i>
                                    </span>
                                    <div class="user-content">
                                       <h6 class="line-height-0">Camila Lynch</h6>
                                       <p class="medium-small blue-grey-text text-lighten-3 pt-3">Leave it</p>
                                    </div>
                                    <span class="secondary-content medium-small">2.00 PM</span>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <div id="settings" class="col s12">
                           <p class="mt-8 mb-0 ml-5 font-weight-900">GENERAL SETTINGS</p>
                           <ul class="collection border-none">
                              <li class="collection-item border-none mt-3">
                                 <div class="m-0">
                                    <span>Notifications</span>
                                    <div class="switch right">
                                       <label>
                                          <input checked type="checkbox" />
                                          <span class="lever"></span>
                                       </label>
                                    </div>
                                 </div>
                              </li>
                              <li class="collection-item border-none mt-3">
                                 <div class="m-0">
                                    <span>Show recent activity</span>
                                    <div class="switch right">
                                       <label>
                                          <input type="checkbox" />
                                          <span class="lever"></span>
                                       </label>
                                    </div>
                                 </div>
                              </li>
                              <li class="collection-item border-none mt-3">
                                 <div class="m-0">
                                    <span>Show recent activity</span>
                                    <div class="switch right">
                                       <label>
                                          <input type="checkbox" />
                                          <span class="lever"></span>
                                       </label>
                                    </div>
                                 </div>
                              </li>
                              <li class="collection-item border-none mt-3">
                                 <div class="m-0">
                                    <span>Show Task statistics</span>
                                    <div class="switch right">
                                       <label>
                                          <input type="checkbox" />
                                          <span class="lever"></span>
                                       </label>
                                    </div>
                                 </div>
                              </li>
                              <li class="collection-item border-none mt-3">
                                 <div class="m-0">
                                    <span>Show your emails</span>
                                    <div class="switch right">
                                       <label>
                                          <input type="checkbox" />
                                          <span class="lever"></span>
                                       </label>
                                    </div>
                                 </div>
                              </li>
                              <li class="collection-item border-none mt-3">
                                 <div class="m-0">
                                    <span>Email Notifications</span>
                                    <div class="switch right">
                                       <label>
                                          <input checked type="checkbox" />
                                          <span class="lever"></span>
                                       </label>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                           <p class="mt-8 mb-0 ml-5 font-weight-900">SYSTEM SETTINGS</p>
                           <ul class="collection border-none">
                              <li class="collection-item border-none mt-3">
                                 <div class="m-0">
                                    <span>System Logs</span>
                                    <div class="switch right">
                                       <label>
                                          <input type="checkbox" />
                                          <span class="lever"></span>
                                       </label>
                                    </div>
                                 </div>
                              </li>
                              <li class="collection-item border-none mt-3">
                                 <div class="m-0">
                                    <span>Error Reporting</span>
                                    <div class="switch right">
                                       <label>
                                          <input type="checkbox" />
                                          <span class="lever"></span>
                                       </label>
                                    </div>
                                 </div>
                              </li>
                              <li class="collection-item border-none mt-3">
                                 <div class="m-0">
                                    <span>Applications Logs</span>
                                    <div class="switch right">
                                       <label>
                                          <input checked type="checkbox" />
                                          <span class="lever"></span>
                                       </label>
                                    </div>
                                 </div>
                              </li>
                              <li class="collection-item border-none mt-3">
                                 <div class="m-0">
                                    <span>Backup Servers</span>
                                    <div class="switch right">
                                       <label>
                                          <input type="checkbox" />
                                          <span class="lever"></span>
                                       </label>
                                    </div>
                                 </div>
                              </li>
                              <li class="collection-item border-none mt-3">
                                 <div class="m-0">
                                    <span>Audit Logs</span>
                                    <div class="switch right">
                                       <label>
                                          <input type="checkbox" />
                                          <span class="lever"></span>
                                       </label>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                        <div id="activity" class="col s12">
                           <div class="activity">
                              <p class="mt-5 mb-0 ml-5 font-weight-900">SYSTEM LOGS</p>
                              <ul class="collection with-header">
                                 <li class="collection-item">
                                    <div class="font-weight-900">
                                       Homepage mockup design <span class="secondary-content">Just now</span>
                                    </div>
                                    <p class="mt-0 mb-2">Melissa liked your activity.</p>
                                    <span class="new badge amber" data-badge-caption="Important"> </span>
                                 </li>
                                 <li class="collection-item">
                                    <div class="font-weight-900">
                                       Melissa liked your activity Drinks. <span class="secondary-content">10 mins</span>
                                    </div>
                                    <p class="mt-0 mb-2">Here are some news feed interactions concepts.</p>
                                    <span class="new badge light-green" data-badge-caption="Resolved"></span>
                                 </li>
                                 <li class="collection-item">
                                    <div class="font-weight-900">
                                       12 new users registered <span class="secondary-content">30 mins</span>
                                    </div>
                                    <p class="mt-0 mb-2">Here are some news feed interactions concepts.</p>
                                 </li>
                                 <li class="collection-item">
                                    <div class="font-weight-900">
                                       Tina is attending your activity <span class="secondary-content">2 hrs</span>
                                    </div>
                                    <p class="mt-0 mb-2">Here are some news feed interactions concepts.</p>
                                 </li>
                                 <li class="collection-item">
                                    <div class="font-weight-900">
                                       Josh is now following you <span class="secondary-content">5 hrs</span>
                                    </div>
                                    <p class="mt-0 mb-2">Here are some news feed interactions concepts.</p>
                                    <span class="new badge red" data-badge-caption="Pending"></span>
                                 </li>
                              </ul>
                              <p class="mt-5 mb-0 ml-5 font-weight-900">APPLICATIONS LOGS</p>
                              <ul class="collection with-header">
                                 <li class="collection-item">
                                    <div class="font-weight-900">
                                       New order received urgent <span class="secondary-content">Just now</span>
                                    </div>
                                    <p class="mt-0 mb-2">Melissa liked your activity.</p>
                                 </li>
                                 <li class="collection-item">
                                    <div class="font-weight-900">System shutdown. <span class="secondary-content">5 min</span></div>
                                    <p class="mt-0 mb-2">Here are some news feed interactions concepts.</p>
                                    <span class="new badge blue" data-badge-caption="Urgent"> </span>
                                 </li>
                                 <li class="collection-item">
                                    <div class="font-weight-900">
                                       Database overloaded 89% <span class="secondary-content">20 min</span>
                                    </div>
                                    <p class="mt-0 mb-2">Here are some news feed interactions concepts.</p>
                                 </li>
                              </ul>
                              <p class="mt-5 mb-0 ml-5 font-weight-900">SERVER LOGS</p>
                              <ul class="collection with-header">
                                 <li class="collection-item">
                                    <div class="font-weight-900">System error <span class="secondary-content">10 min</span></div>
                                    <p class="mt-0 mb-2">Melissa liked your activity.</p>
                                 </li>
                                 <li class="collection-item">
                                    <div class="font-weight-900">
                                       Production server down. <span class="secondary-content">1 hrs</span>
                                    </div>
                                    <p class="mt-0 mb-2">Here are some news feed interactions concepts.</p>
                                    <span class="new badge blue" data-badge-caption="Urgent"></span>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <!-- Slide Out Chat -->
               <ul id="slide-out-chat" class="sidenav slide-out-right-sidenav-chat">
                  <li class="center-align pt-2 pb-2 sidenav-close chat-head">
                     <a href="#!"><i class="material-icons mr-0">chevron_left</i>Elizabeth Elliott</a>
                  </li>
                  <li class="chat-body">
                     <ul class="collection">
                        <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                           <span class="avatar-status avatar-online avatar-50"
                              ><img src="../../../assets/images/avatar/avatar-7.png" alt="avatar" />
                           </span>
                           <div class="user-content speech-bubble">
                              <p class="medium-small">hello!</p>
                           </div>
                        </li>
                        <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                           <div class="user-content speech-bubble-right">
                              <p class="medium-small">How can we help? We're here for you!</p>
                           </div>
                        </li>
                        <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                           <span class="avatar-status avatar-online avatar-50"
                              ><img src="../../../assets/images/avatar/avatar-7.png" alt="avatar" />
                           </span>
                           <div class="user-content speech-bubble">
                              <p class="medium-small">I am looking for the best admin template.?</p>
                           </div>
                        </li>
                        <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                           <div class="user-content speech-bubble-right">
                              <p class="medium-small">Materialize admin is the responsive materializecss admin template.</p>
                           </div>
                        </li>

                        <li class="collection-item display-grid width-100 center-align">
                           <p>8:20 a.m.</p>
                        </li>

                        <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                           <span class="avatar-status avatar-online avatar-50"
                              ><img src="../../../assets/images/avatar/avatar-7.png" alt="avatar" />
                           </span>
                           <div class="user-content speech-bubble">
                              <p class="medium-small">Ohh! very nice</p>
                           </div>
                        </li>
                        <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                           <div class="user-content speech-bubble-right">
                              <p class="medium-small">Thank you.</p>
                           </div>
                        </li>
                        <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                           <span class="avatar-status avatar-online avatar-50"
                              ><img src="../../../assets/images/avatar/avatar-7.png" alt="avatar" />
                           </span>
                           <div class="user-content speech-bubble">
                              <p class="medium-small">How can I purchase it?</p>
                           </div>
                        </li>

                        <li class="collection-item display-grid width-100 center-align">
                           <p>9:00 a.m.</p>
                        </li>

                        <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                           <div class="user-content speech-bubble-right">
                              <p class="medium-small">From ThemeForest.</p>
                           </div>
                        </li>
                        <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                           <div class="user-content speech-bubble-right">
                              <p class="medium-small">Only $24</p>
                           </div>
                        </li>
                        <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                           <span class="avatar-status avatar-online avatar-50"
                              ><img src="../../../assets/images/avatar/avatar-7.png" alt="avatar" />
                           </span>
                           <div class="user-content speech-bubble">
                              <p class="medium-small">Ohh! Thank you.</p>
                           </div>
                        </li>
                        <li class="collection-item display-flex avatar pl-5 pb-0" data-target="slide-out-chat">
                           <span class="avatar-status avatar-online avatar-50"
                              ><img src="../../../assets/images/avatar/avatar-7.png" alt="avatar" />
                           </span>
                           <div class="user-content speech-bubble">
                              <p class="medium-small">I will purchase it for sure.</p>
                           </div>
                        </li>
                        <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                           <div class="user-content speech-bubble-right">
                              <p class="medium-small">Great, Feel free to get in touch on</p>
                           </div>
                        </li>
                        <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat">
                           <div class="user-content speech-bubble-right">
                              <p class="medium-small">https://pixinvent.ticksy.com/</p>
                           </div>
                        </li>
                     </ul>
                  </li>
                  <li class="center-align chat-footer">
                     <form class="col s12" onsubmit="slide_out_chat()" action="javascript:void(0);">
                        <div class="input-field">
                           <input id="icon_prefix" type="text" class="search" />
                           <label for="icon_prefix">Type here..</label>
                           <a onclick="slide_out_chat()"><i class="material-icons prefix">send</i></a>
                        </div>
                     </form>
                  </li>
               </ul>
            </aside>
            <!-- END RIGHT SIDEBAR NAV -->

          </div>
        </div>
      </div>
    </div>
    <!-- END: Page Main-->