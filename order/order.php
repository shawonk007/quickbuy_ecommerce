<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <form action="" method="post">
            <!-- <div class="card"> -->

            <!-- <div class="card-body"> -->
            <div class="my-2">
                <h5>Credit card</h5>
                <div class="row ">
                    <div class="col-6">
                        <div class="from-group">
                            <label for=""></label>
                            <div class="input-group">
                                <input type="text" name="" class="form-control" id="" placeholder="First Name">

                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="from-group">
                            <label for=""></label>
                            <div class="input-group">
                                <input type="text" name="" class="form-control" id="" placeholder="Last Name">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="from-group">
                    <label for=""></label>
                    <div class="input-group">
                        <input type="text" name="" class="form-control" id="" placeholder="Card Number">

                    </div>
                </div>

                <div class="mb-3 row mt-5">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control" id="inputPassword">
                                <div id="emailHelp" class="form-text">First Name</div>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" id="inputPassword">
                                <div id="emailHelp" class="form-text">Last Name</div>
                            </div>
                        </div>

                    </div>
                </div>



                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputPassword">
                        <div id="emailHelp" class="form-text">example@example.com</div>
                    </div>

                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Contact Number</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputPassword" placeholder="(000)000-0000">
                    </div>
                </div>
                <div class="mb-3 row mt-4">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Billing Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword">
                        <div id="emailHelp" class="form-text">Street address</div>
                        <input type="text" class="form-control" id="inputPassword">
                        <div id="emailHelp" class="form-text">Street address line 2</div>
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control" id="inputPassword">
                                <div id="emailHelp" class="form-text">City</div>

                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" id="inputPassword">
                                <div id="emailHelp" class="form-text">State/Province</div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control" id="inputPassword">
                                <div id="emailHelp" class="form-text">Postal/Zip code</div>

                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" id="inputPassword" placeholder="Please select">
                                <div id="emailHelp" class="form-text">Country</div>

                            </div>

                        </div>



                    </div>

                </div>
                <div class="mb-3 row mt-5">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Send Gift</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled">
                                    <label class="form-check-label" for="flexRadioDisabled">
                                        Yes
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled">
                                    <label class="form-check-label" for="flexRadioDisabled">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Additional Requestes</label>
                    <div class="col-sm-10">
                        <div class="mb-3 row">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Type here...</label>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th>Thumbnail</th>
                    <th>Description</th>
                    <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>
                        <img src="https://via.placeholder.com/100x100" alt="" />
                    </td>
                    <td>
                        <h6>White T-Shirt</h6>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <div class="input-group input-group-sm w-25">
                        <button type="submit" class="btn btn-secondary">-</button>
                        <input type="text" name="" class="form-control" id="" value="1" />
                        <button type="submit" class="btn btn-secondary">+</button>
                        </div>
                    </td>
                    <td>$30.00</td>
                    </tr>
                </tbody>
                </table>


        </form>
        <hr>
        <div class="text-center">
            <a href="#" class="btn btn-primary ">
                Order Now
            </a>
        </div>


    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>