<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

    <style id="myStyles">
        html,
        body {
            margin: 0px;
            padding: 0px;
            width: 100%;
            height: 100%;
            font-family: Helvetica;
            overflow: hidden;
        }

        #tree {
            width: 100%;
            height: 100%;
        }

        /*partial*/
        [lcn='hr-team']>rect {
            fill: #FFCA28;
        }

        [lcn='sales-team']>rect {
            fill: #F57C00;
        }

        [lcn='top-management']>rect {
            fill: #f2f2f2;
        }

        [lcn='top-management']>text,
        .assistant>text {
            fill: #aeaeae;
        }

        [lcn='top-management'] circle,
        [lcn='assistant'] {
            fill: #aeaeae;
        }

        .assistant>rect {
            fill: #ffffff;
        }

        .assistant [control-node-menu-id]>circle {
            fill: #aeaeae;
        }

        .it-team>rect {
            fill: #b4ffff;
        }

        .it-team>text {
            fill: #039BE5;
        }

        .it-team>[control-node-menu-id] line {
            stroke: #039BE5;
        }

        .it-team>g>.ripple {
            fill: #00efef;
        }

        .hr-team>rect {
            fill: #fff5d8;
        }

        .hr-team>text {
            fill: #ecaf00;
        }

        .hr-team>[control-node-menu-id] line {
            stroke: #ecaf00;
        }

        .hr-team>g>.ripple {
            fill: #ecaf00;
        }

        .sales-team>rect {
            fill: #ffeedd;
        }

        .sales-team>text {
            fill: #F57C00;
        }

        .sales-team>[control-node-menu-id] line {
            stroke: #F57C00;
        }

        .sales-team>g>.ripple {
            fill: #F57C00;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <div class="row">
                <div class="col-lg-6">
                    <!-- <a href="" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#newMenuModal">Tambah</a> -->
                    <a href="<?php echo base_url('Chart/charttambah'); ?>">
                        <button class="btn btn-primary">Tambah Rekod</button>
                    </a>
                    <br></br>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Struktur Organisasi</th>
                                <th scope="col">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Bahagian Sistem Maklumat</td>
                                <td>
                                    <a href="<?php echo base_url('Chart/chartdetail/'); ?>" class="badge badge-success">edit</a>
                                    <a href="" class="badge badge-danger">delete</a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Bahagian Pentadbiran dan Sokongan</td>
                                <td>
                                    <a href="<?php echo base_url('Chart/chartdetail/'); ?>" class="badge badge-success">edit</a>
                                    <a href="" class="badge badge-danger">delete</a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Bahagian Infostruktur</td>
                                <td>
                                    <a href="<?php echo base_url('Chart/chartdetail/'); ?>" class="badge badge-success">edit</a>
                                    <a href="" class="badge badge-danger">delete</a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Bahagian Strategik dan Keselamatan</td>
                                <td>
                                    <a href="<?php echo base_url('Chart/chartdetail/'); ?>" class="badge badge-success">edit</a>
                                    <a href="" class="badge badge-danger">delete</a>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Modal -->
    <div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">

                        <div class="form-group">
                            <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>