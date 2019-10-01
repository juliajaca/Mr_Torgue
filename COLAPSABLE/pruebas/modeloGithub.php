<!DOCTYPE html>
<html>

<head>
    <link href="http://getbootstrap.com/2.3.2/assets/css/bootstrap.css" rel="stylesheet">
    <link href="http://getbootstrap.com/2.3.2/assets/css/bootstrap-responsive.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Table</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>

            </tbody>
        </table>
        <h1>Table + collapse</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <tr class="accordion-toggle" data-toggle="collapse" data-target="#collapseOne">
                    <td>1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="3">
                        <div id="collapseOne" class="collapse in">
                            - Details 1 <br /> - Details 2 <br /> - Details 3 <br />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
            </tbody>
        </table>
        <h1>Table + collapse + buttons</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr class="accordion-toggle">
                    <td data-toggle="collapse" data-target="#collapseTwo">1</td>
                    <td data-toggle="collapse" data-target="#collapseTwo">Mark</td>
                    <td data-toggle="collapse" data-target="#collapseTwo">Otto</td>
                    <td data-toggle="collapse" data-target="#collapseTwo">@mdo</td>
                    <td><a class="btn btn-primary" href="https://www.google.com/"><i
                                class="icon-search icon-white"></i></a></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">
                        <div id="collapseTwo" class="collapse in">
                            - Details 1 <br /> - Details 2 <br /> - Details 3 <br />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td><a class="btn btn-primary" href="https://www.google.com/"><i
                                class="icon-search icon-white"></i></a></td>
                </tr>
            </tbody>
        </table>
        <h1>Div</h1>
        <div class="table">
            <div class="row-fluid">
                <div class="span1">#</div>
                <div class="span3">First Name</div>
                <div class="span3">Last Name</div>
                <div class="span3">Username</div>
            </div>
            <div class="row-fluid">
                <div class="span1">1</div>
                <div class="span3">Mark</div>
                <div class="span3">Otto</div>
                <div class="span3">@mdo</div>
            </div>
            <div class="row-fluid">
                <div class="span1">2</div>
                <div class="span3">Jacob</div>
                <div class="span3">Thornton</div>
                <div class="span3">@fat</div>
            </div>
        </div>
        <h1>Div + collapse</h1>
        <div class="table">
            <div class="row-fluid">
                <div class="span1">#</div>
                <div class="span3">First Name</div>
                <div class="span3">Last Name</div>
                <div class="span3">Username</div>
            </div>
            <div class="row-fluid accordion-toggle" data-toggle="collapse" data-target="#collapseThree">
                <div class="span1">1</div>
                <div class="span3">Mark</div>
                <div class="span3">Otto</div>
                <div class="span3">@mdo</div>
            </div>
            <div id="collapseThree" class="row-fluid collapse in">
                <div class="span1"></div>
                <div class="span9">
                    - Details 1 <br /> - Details 2 <br /> - Details 3 <br />
                </div>
            </div>
            <div class="row-fluid">
                <div class="span1">2</div>
                <div class="span3">Jacob</div>
                <div class="span3">Thornton</div>
                <div class="span3">@fat</div>
            </div>
        </div>

        <h1>Div + collapse + buttons</h1>
        <div class="table">
            <div class="row-fluid">
                <div class="span1">#</div>
                <div class="span3">First Name</div>
                <div class="span3">Last Name</div>
                <div class="span3">Username</div>
                <div class="span1"></div>
            </div>
            <div class="row-fluid">
                <div class="accordion-toggle" data-toggle="collapse" data-target="#collapseFour">
                    <div class="span1">1</div>
                    <div class="span3">Mark</div>
                    <div class="span3">Otto</div>
                    <div class="span3">@mdo</div>
                </div>
                <div class="span1">
                    <a class="btn btn-primary" href="https://www.google.com/"><i class="icon-search icon-white"></i></a>
                </div>
            </div>
            <div id="collapseFour" class="row-fluid collapse in">
                <div class="span1"></div>
                <div class="span9">
                    - Details 1 <br /> - Details 2 <br /> - Details 3 <br />
                </div>
            </div>
            <div class="row-fluid">
                <div class="span1">2</div>
                <div class="span3">Jacob</div>
                <div class="span3">Thornton</div>
                <div class="span3">@fat</div>
                <div class="span1">
                    <a class="btn btn-primary" href="https://www.google.com/"><i class="icon-search icon-white"></i></a>
                </div>
            </div>
        </div>

    </div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://getbootstrap.com/2.3.2/assets/js/jquery.js"></script>
    <script src="http://getbootstrap.com/2.3.2/assets/js/bootstrap.js"></script>

    <script src="http://getbootstrap.com/2.3.2/assets/js/holder/holder.js"></script>
    <script src="http://getbootstrap.com/2.3.2/assets/js/google-code-prettify/prettify.js"></script>

    <script src="http://getbootstrap.com/2.3.2/assets/js/application.js"></script>




    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

    <!-- Abierto -->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false"
                        aria-controls="collapseOne">
                        This Panel is Open By Default
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    Open
                </div>
            </div>
        </div>


        <!-- Cerrado -->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                        aria-expanded="false" aria-controls="collapseTwo">
                        This Panel Is Closed By Default
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    Closed
                </div>
            </div>
        </div>
    </div>
</body>

</html>