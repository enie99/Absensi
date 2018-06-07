  <style type="text/css">
      /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* 15% from the top and centered */
        margin-left: 30%;
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
    }

    /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
  </style>


        <!-- page heading start-->
        <div id="content">
            <div id="content-header">
                <div id="breadcrumb">
                    <a href="<?php echo base_url('mastercms'); ?>" title="" class="tip-bottom" data-original-title="Go to Home">
                        <i class="icon-home"></i> Home
                    </a>
                    <a href="#" class="current"></i></i>Content
                    </a>
                </div>
            </div>
            <!-- page heading end-->

            <!-- body wrapper start -->
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <form name="filterFrm" action="" method="post">
                            <div class="span2">
                                <div class="controls">
                                    <input type="text" name="filterKey" class="span12" placeholder="keyword.." value="" />
                                </div>
                            </div>
                            <div class="span4" style="margin-left: 5px">
                                <div class="controls">
                                    <p>
                                        <button name="filterCustomer" type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Filter</button>
                                        <button name="resetFilterCustomer" type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Reset Filter</button>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title" style="margin-bottom: 15px">
                                <span class="icon">
                                    <i class="icon-th-list"></i>
                                </span>
                                <h5>
                                    List Data Perusahaan
                                </h5>
                                <span class="label label-success"><a style="color: #fff" href="<?php echo base_url('mastercms/perusahaan/add'); ?>"><i class="fa fa-plus"></i> Add Perusahaan</a></span>

                            </div>
                            <div class="widget-content nopadding">
                                <section id="no-more-tables">
                                    <table class="table table-data table-bordered table-hover table-condensed cf">
                                        <thead class="DataTables_sort_wrapper" >
                                            <tr>
                                                <th style="background: #dedeec; font-size: 12px" width="2%">No</th>
                                                <th style="background: #dedeec; font-size: 12px" width="15%">Perusahaan / Cabang</th>
                                                <!--<th style="background: #dedeec; font-size: 12px" width="85">Foto</th>-->
                                                <th style="background: #dedeec; font-size: 12px" width="5%">Title</th>
                                                <th style="background: #dedeec; font-size: 12px" width="20%">Alamat Perusahaan</th>
                                                <th style="background: #dedeec; font-size: 12px" width="10%">Hari & Jam Kerja</th>
                                                <th style="background: #dedeec; font-size: 12px" width="10%">QR Code</th>
                                                <th style="background: #dedeec; font-size: 12px" width="7%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php foreach ($perusahaan as $key =>$p){ ?>
                                                <td data-title="No"><?php echo $key+1 ; ?></td>
                                                <td data-title="nama perusahaan"><strong><?php echo $p['lokasi_nama']; ?></strong></td>
                                                <td data-title="No. HP"><?php echo $p['perusahaan_title']; ?></td>
                                                <td data-title="Alamat"><?php echo $p['perusahaan_alamat'] ?></td>
                                                <td>
                                                    <span class="btn btn-primary"><a href="<?php echo base_url('mastercms/perusahaan/add_jam_kerja/'.$p['lokasi_id']); ?>" title="Detail" style="color: white">Add / Edit</a></span>
                                                    <!-- <span class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="myBtn">View</span> -->
                                                    <button id="myBtn">View</button>

                                                    <!-- Modal Jam Kerja -->

                                                    <!-- The Modal -->
                                                    <div id="myModal" class="modal">

                                                      <!-- Modal content -->
                                                        <div class="modal-content">
                                                            <span class="close">&times;</span>
                                                            <p>Some text in the Modal..</p>
                                                        </div>

                                                    </div>

                                                    <!-- Modal Jam Kerja -->

                                                </td>
                                                <td><img style="width: 150px;" src="<?php echo base_url('assets/images/qrcode/').$p['qr_code'];?>"></td>
                                                <!-- <td data-title="Bidang"><?php echo $value['qr_code'] ?></td> -->
                                                <td data-title="Aksi" align="center">
                                                    <a href="<?php echo base_url('mastercms/perusahaan/detail/'.$p['lokasi_id']); ?>" title="Detail"><i class="fa fa-eye"></i></a> &nbsp;
                                                    <a href="<?php echo base_url('mastercms/perusahaan/edit/'.$p['lokasi_id']); ?>" title="Edit"><i class="fa fa-pencil"></i></a> &nbsp;
                                                    <a href="<?php echo base_url('mastercms/perusahaan/hapus'); ?>" title="Hapus"><i class="fa fa-trash-o"></i></a> &nbsp;
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <div class="center" style="text-align: center">
                                        paging
                                    </div>

                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>





<script type="text/javascript">
        // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>