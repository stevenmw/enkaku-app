<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Enkaku</title>
    <!-- MATERIAL ICONS CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
    rel="stylesheet">
    <!-- GOOGLE FONTS (POPPINS) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    {{-- Boostrap CSS --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <!-- stylesheet CSS-->
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <nav>
        <div class="container">
            <!-- <img src="./images/logo.png" class="logo"> -->
            <a href="/main">
                <img src="./images/Logo 2 (1).svg" class="logo">
            </a>
            <div class="search-bar">
                <span class="material-icons-sharp">search</span>
                <input type="search" placeholder="Search">
            </div>
            <div class="profile-area">
                <!-- <div class="theme-btn">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div> -->
                <div class="profile">
                    <div class="profile-photo">
                        <img src="./images/profile-1.jpg">
                    </div>
                    <h5>Steven M</h5>
                    <span class="material-icons-sharp">expand_more
                    </span>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                          Profile
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a href="/login" class="dropdown-item" href="#">My Profile</a></li>
                            <li><a href='#' class="dropdown-item" href="#">Settings</a></li>
                            <li><a href='#' class="dropdown-item" href="#">Logut</a></li>
                        </ul>
                    </div>
                </div>
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
            </div>
        </div>
    </nav>
    <!-- END OF NAVBAR -->

    <main>
        <aside>
            <button id="close-btn">
                <span class="material-icons-sharp">close</span>
            </button>

            <div class="sidebar">
                <a href="#" class="active">
                    <span class="material-icons-sharp">dashboard</span>
                    <h4>Dashboard</h4>
                </a>
                <a href="#">
                  <span class="material-icons-sharp">app_registration</span>
                    <h4>Registration</h4>
                </a>
                <!-- <a href="#">
                    <span class="material-icons-sharp">account_balance_wallet</span>
                    <h4>User List</h4>
                </a> -->
                <a href="#">
                  <span class="material-icons-sharp">people_alt</span>
                    <h4>User List</h4>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">pie_chart</span>
                    <h4>Analytics</h4>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">message</span>
                    <h4>Messages</h4>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">help_center</span>
                    <h4>Help Center</h4>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">settings</span>
                    <h4>Settings</h4>
                </a>
            </div>
            <!-- END OF SIDEBAR -->

            {{-- <div class="updates">
                <span class="material-icons-sharp">update</span>
                <h4>Update Available</h4>
                <p>Security Updates</p>
                <p>General Updates</p>
                <a href="#">Update Now</a>
            </div> --}}
        </aside>
        <!------------------------------------- END OF ASIDE -------------------------------------------->

        <section class="middle">
            <div class="header">
                <h1>Overview</h1>
                <input type="date">
            </div>
            <!-- <div class="cards"> -->
                <!-- <div class="card">
                    <div class="top">
                        <div class="left">
                            <img src="./images/BTC.png">
                            <h2>BTC</h2>
                        </div>
                        <img src="./images/visa.png" class="right">
                    </div>
                    <div class="middle">
                        <h1>$827,199</h1>
                        <div class="chip">
                            <img src="./images/card chip.png" class="chip">
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="left">
                            <small>Card Holder</small>
                            <h5>JOHN DOE</h5>
                        </div>
                        <div class="right">
                            <div class="expiry">
                                <small>Expiry</small>
                                <h5>08/27</h5>
                            </div>
                            <div class="cvv">
                                <small>CVV</small>
                                <h5>123</h5>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- END OF CARD 1 -->

                <!-- <div class="card">
                    <div class="top">
                        <div class="left">
                            <img src="./images/ETH.png">
                            <h2>ETH</h2>
                        </div>
                        <img src="./images/master card.png" class="right">
                    </div>
                    <div class="middle">
                        <h1>$95,623</h1>
                        <div class="chip">
                            <img src="./images/card chip.png" class="chip">
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="left">
                            <small>Card Holder</small>
                            <h5>JOHN DOE</h5>
                        </div>
                        <div class="right">
                            <div class="expiry">
                                <small>Expiry</small>
                                <h5>08/27</h5>
                            </div>
                            <div class="cvv">
                                <small>CVV</small>
                                <h5>123</h5>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- END OF CARD 2 -->

                <!-- <div class="card">
                    <div class="top">
                        <div class="left">
                            <img src="./images/BTC.png">
                            <h2>BTC</h2>
                        </div>
                        <img src="./images/visa.png" class="right">
                    </div>
                    <div class="middle">
                        <h1>$74,623</h1>
                        <div class="chip">
                            <img src="./images/card chip.png" class="right">
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="left">
                            <small>Card Holder</small>
                            <h5>JOHN DOE</h5>
                        </div>
                        <div class="right">
                            <div class="expiry">
                                <small>Expiry</small>
                                <h5>08/23</h5>
                            </div>
                            <div class="cvv">
                                <small>CVV</small>
                                <h5>123</h5>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- END OF CARD 3 -->
            <!-- </div> -->
            <!-- END OF CARD -->

            <div class="monthly-reports">
                <!-- <div class="report">
                    <h3>Income</h3>
                    <div>
                        <details>
                            <h1>$29.79</h1>
                            <h6 class="success">+3.5%</h6>
                        </details>
                        <p class="text-muted">Compared to $26 last month</p>
                    </div>
                </div> -->
                <!-- END OF INCOME REPORT -->
                <!-- <div class="report">
                    <h3>Expenses</h3>
                    <div>
                        <details>
                            <h1>$29.79</h1>
                            <h6 class="danger">+4.5%</h6>
                        </details>
                        <p class="text-muted">Compared to $26 last month</p>
                    </div>
                </div> -->
                <!-- END OF EXPENSES REPORT -->
                <!-- <div class="report">
                    <h3>Cashback</h3>
                    <div>
                        <details>
                            <h1>$29.79</h1>
                            <h6 class="success">+5.5%</h6>
                        </details>
                        <p class="text-muted">Compared to $26 last month</p>
                    </div>
                </div> -->
                <!-- END OF CASHBACK REPORT -->
                <!-- <div class="report">
                    <h3>Turnover</h3>
                    <div>
                        <details>
                            <h1>$29.79</h1>
                            <h6 class="danger">+6.5%</h6>
                        </details>
                        <p class="text-muted">Compared to $26 last month</p>
                    </div>
                </div> -->
                <!-- END OF TURNOVER REPORT -->
            </div>
            <!-- END OF MONTHLY REPORTS -->

            <div class="fast-payment">
                <h2>Progress Training</h2>
                <div class="badges">
                    <!-- <div class="badge">
                        <span class="material-icons-sharp">add</span>
                    </div>
                    <div class="badge">
                        <span class="bg-primary"></span>
                        <div>
                            <h5>Training</h5>
                            <h4>$50</h4>
                        </div>
                    </div>
                    <div class="badge">
                        <span class="bg-success"></span>
                        <div>
                            <h5>Internet</h5>
                            <h4>$50</h4>
                        </div>
                    </div>
                    <div class="badge">
                        <span class="bg-success"></span>
                        <div>
                            <h5>Gas</h5>
                            <h4>$50</h4>
                        </div>
                    </div>
                    <div class="badge">
                        <span class="bg-primary"></span>
                        <div>
                            <h5>Education</h5>
                            <h4>$50</h4>
                        </div>
                    </div>
                    <div class="badge">
                        <span class="bg-danger"></span>
                        <div>
                            <h5>Electricity</h5>
                            <h4>$50</h4>
                        </div>
                    </div>
                    <div class="badge">
                        <span class="bg-success"></span>
                        <div>
                            <h5>Food</h5>
                            <h4>$50</h4>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- END OF FAST PAYMENT -->

            <canvas id="chart"></canvas>

        </section>
        <!-- END OF MIDDLE -->

        <section class="right">
            <div class="investments">
                <!-- <div class="header">
                    <h1>investments</h1>
                    <a href="#">More <span class="material-icons-sharp">
                        chevron_right</span></a>
                </div>

                <div class="investment">
                    <img src="./images/uniliver.png">
                    <h4>Uniliver</h4>
                    <div class="date-time">
                        <p>7 Nov, 2021</p>
                        <small class="text-muted">9:14pm</small>
                    </div>
                    <div class="bonds">
                        <p>1402</p>
                        <small class="text-muted">Bonds</small>
                    </div>
                    <div class="amount">
                        <h4>$20,49</h4>
                        <small class="danger">-4.06%</small>
                    </div>
                </div>
                <div class="investment">
                    <img src="./images/tesla.png">
                    <h4>Tesla</h4>
                    <div class="date-time">
                        <p>7 Nov, 2021</p>
                        <small class="text-muted">9:14pm</small>
                    </div>
                    <div class="bonds">
                        <p>1402</p>
                        <small class="text-muted">Bonds</small>
                    </div>
                    <div class="amount">
                        <h4>$20,49</h4>
                        <small class="success">+4.06%</small>
                    </div>
                </div>
                <div class="investment">
                    <img src="./images/monster.png">
                    <h4>Monster</h4>
                    <div class="date-time">
                        <p>7 Nov, 2021</p>
                        <small class="text-muted">9:14pm</small>
                    </div>
                    <div class="bonds">
                        <p>1402</p>
                        <small class="text-muted">Bonds</small>
                    </div>
                    <div class="amount">
                        <h4>$20,49</h4>
                        <small class="success">+4.06%</small>
                    </div>
                </div>
                <div class="investment">
                    <img src="./images/mcdonalds.png">
                    <h4>Mcdonalds</h4>
                    <div class="date-time">
                        <p>7 Nov, 2021</p>
                        <small class="text-muted">9:14pm</small>
                    </div>
                    <div class="bonds">
                        <p>1402</p>
                        <small class="text-muted">Bonds</small>
                    </div>
                    <div class="amount">
                        <h4>$20,49</h4>
                        <small class="danger">-4.06%</small>
                    </div>
                </div> -->
                <!-- END OF INVESTMENT -->
            </div>
            <!---------------------------- END OF INVESTMENTS ------------------------------->

            <div class="recent-transactions">
                <div class="header">
                    <h2>Recent Activities</h2>
                    <a href="#">More <span class="material-icons-sharp">chevron_right</span></a>
                </div>

                <!-- <div class="transaction">
                    <div class="service">
                        <div class="icon bg-purple-light">
                            <span class="material-icons-sharp purple">headphones</span>
                        </div>
                        <div class="details">
                            <h4>Music</h4>
                            <p>20.11.2021</p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-danger">
                            <img src="/images/visa.png">
                        </div>
                        <div class="details">
                            <p>*2757</p>
                            <small class="text-muted">Credit Card</small>
                        </div>
                    </div>
                    <h4>$25</h4>
                </div> -->
                <!-- END OF TRANSACTION -->
                <!-- <div class="transaction">
                    <div class="service">
                        <div class="icon bg-purple-light">
                            <span class="material-icons-sharp purple">shopping_bag</span>
                        </div>
                        <div class="details">
                            <h4>Shopping</h4>
                            <p>20.11.2021</p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-primary">
                            <img src="/images/visa.png">
                        </div>
                        <div class="details">
                            <p>*2757</p>
                            <small class="text-muted">Credit Card</small>
                        </div>
                    </div>
                    <h4>$25</h4>
                </div> -->
                <!-- END OF TRANSACTION -->
                <!-- <div class="transaction">
                    <div class="service">
                        <div class="icon bg-success-light">
                            <span class="material-icons-sharp success">restaurant</span>
                        </div>
                        <div class="details">
                            <h4>Restaurant</h4>
                            <p>20.11.2021</p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-dark">
                            <img src="/images/master card.png">
                        </div>
                        <div class="details">
                            <p>*2757</p>
                            <small class="text-muted">Master Card</small>
                        </div>
                    </div>
                    <h4>$25</h4>
                </div> -->
                <!-- END OF TRANSACTION -->
                <!-- <div class="transaction">
                    <div class="service">
                        <div class="icon bg-danger-light">
                            <span class="material-icons-sharp danger">sports_esports</span>
                        </div>
                        <div class="details">
                            <h4>Games</h4>
                            <p>20.11.2021</p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-danger">
                            <img src="/images/visa.png">
                        </div>
                        <div class="details">
                            <p>*2757</p>
                            <small class="text-muted">Credit Card</small>
                        </div>
                    </div>
                    <h4>$45</h4>
                </div> -->
                <!-- END OF TRANSACTION -->
                <!-- <div class="transaction">
                    <div class="service">
                        <div class="icon bg-danger-light">
                            <span class="material-icons-sharp danger">medication</span>
                        </div>
                        <div class="details">
                            <h4>Medication</h4>
                            <p>20.11.2021</p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-danger">
                            <img src="/images/visa.png">
                        </div>
                        <div class="details">
                            <p>*2757</p>
                            <small class="text-muted">Credit Card</small>
                        </div>
                    </div>
                    <h4>$45</h4>
                </div> -->
                <!-- END OF TRANSACTION -->
            </div>
            <!-- ================= END OF RECENT TRANSACTIONS ================== -->
        </section>
        <!-- END OF RIGHT -->
    </main>
    <!-- ============== END OF ASIDE =============== -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ=="crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="/js/main.js"></script>
</body>
</html>