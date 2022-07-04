
<!-- Main content -->
<section class="content" style="width: max-content; max-width: max-content;">
      <div class="container-fluid">
        <div class="row">
        <div>
        <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title">Hasil Survey</h3>
            </div> -->
              <!-- /.card-header -->
              <div class="card-body">
              <p><b>Data Hasil Survey</b></p>
              <hr>
                <table id="survey" class="table table-bordered table-striped col-lg">
                  <thead style="background-color: cornflowerblue;">
                  <tr>
                    <th colspan="2" style="text-align: center;">Respondent</th>
                    <th colspan="38" style="text-align: center;">
                      Kuesioner
                    </th>
                  </tr>
                  <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                    <th>9</th>
                    <!-- <th>10</th> -->
                    <th>11</th>
                    <th>12</th>
                    <th>13</th>
                    <th>14</th>
                    <th>15</th>
                    <th>16</th>
                    <th>17</th>
                    <th>18</th>
                    <th>19</th>
                    <th>20</th>
                    <th>21</th>
                    <th>22</th>
                    <th>23</th>
                    <th>24</th>
                    <th>25</th>
                    <th>26</th>
                    <th>27</th>
                    <th>28</th>
                    <th>29</th>
                    <th>30</th>
                    <th>31</th>
                    <th>32</th>
                    <th>33</th>
                    <th>34</th>
                    <th>35</th>
                    <th>36</th>
                    <th>37</th>
                    <th>38</th>
                    <th>39</th>
                  </tr>
             
                  </thead>
                  <tbody>
                  <?php
                  $id = 1;
                  // $jum = 0;
                    foreach($project as $row)
                    {
                      $jum=1;
                 ?>
                  <tr>
                   <td><?= $id++; ?>.</td>
                    <td><?= $row['respondent'];?></td>
                    <td><?= $row['quesioner1'];?></td>
                    <td><?= $row['quesioner2'];?></td>
                    <td><?= $row['quesioner3'];?></td>
                    <td><?= $row['quesioner4'];?></td>
                    <td><?= $row['quesioner5'];?></td>
                    <td><?= $row['quesioner6'];?></td>
                    <td><?= $row['quesioner7'];?></td>
                    <td><?= $row['quesioner8'];?></td>
                    <td><?= $row['quesioner9'];?></td>
                    <!-- <td><?= $row['quesioner10'];?></td> -->
                    <td><?= $row['quesioner11'];?></td>
                    <td><?= $row['quesioner12'];?></td>
                    <td><?= $row['quesioner13'];?></td>
                    <td><?= $row['quesioner14'];?></td>
                    <td><?= $row['quesioner15'];?></td>
                    <td><?= $row['quesioner16'];?></td>
                    <td><?= $row['quesioner17'];?></td>
                    <td><?= $row['quesioner18'];?></td>
                    <td><?= $row['quesioner19'];?></td>
                    <td><?= $row['quesioner20'];?></td>
                    <td><?= $row['quesioner21'];?></td>
                    <td><?= $row['quesioner22'];?></td>
                    <td><?= $row['quesioner23'];?></td>
                    <td><?= $row['quesioner24'];?></td>
                    <td><?= $row['quesioner25'];?></td>
                    <td><?= $row['quesioner26'];?></td>
                    <td><?= $row['quesioner27'];?></td>
                    <td><?= $row['quesioner28'];?></td>
                    <td><?= $row['quesioner29'];?></td>
                    <td><?= $row['quesioner30'];?></td>
                    <td><?= $row['quesioner31'];?></td>
                    <td><?= $row['quesioner32'];?></td>
                    <td><?= $row['quesioner33'];?></td>
                    <td><?= $row['quesioner34'];?></td>
                    <td><?= $row['quesioner35'];?></td>
                    <td><?= $row['quesioner36'];?></td>
                    <td><?= $row['quesioner37'];?></td>
                    <td><?= $row['quesioner38'];?></td>
                    <td><?= $row['quesioner39'];?></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                
                </table>
                <br>
                <hr>
                  <p><b>Tingkat Kematangan Per-Kriteria / Domain</b></p>
                <hr>
                <p>Domain Komunikasi (COM)</p>
                      <table class="table table-bordered table-striped" style="width: 1000px;">
                          <thead style="background-color: antiquewhite;">
                              <tr>
                                <th style="width: 100px;">#</th>
                                <th>Atribut</th>
                                <th>Nilai</th>
                                <th>Level</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $no=1;
                            $id=1;
                            foreach($com as $cm){ ?>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>COM<?= $id++; ?></td>
                              <td><?= $cm['COM1'] ?></td>
                              <td><?= floor($cm['COM1']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>COM<?= $id++; ?></td>
                              <td><?= $cm['COM2'] ?></td>
                              <td><?= floor($cm['COM2']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>COM<?= $id++; ?></td>
                              <td><?= $cm['COM3'] ?></td>
                              <td><?= floor($cm['COM3']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>COM<?= $id++; ?></td>
                              <td><?= $cm['COM4'] ?></td>
                              <td><?= floor($cm['COM4']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>COM<?= $id++; ?></td>
                              <td><?= $cm['COM5'] ?></td>
                              <td><?= floor($cm['COM5']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>COM<?= $id++; ?></td>
                              <td><?= $cm['COM6'] ?></td>
                              <td><?= floor($cm['COM6']); ?></td>
                            </tr>
                            <tr>
                              <!-- <td></td> -->
                              <td colspan="2" style="text-align: center ;">Tingkat Kematangan Domain COM</td>
                              <td><?= $cm['total']; ?></td>
                              <td><?= floor($cm['total']); ?></td>
                            </tr>
                            <?php } ?>
                          </tbody>
                      </table>
                <br>
                <br>
                <p>Domain Manfaat & Kompetensi TI (CVM)</p>
                      <table class="table table-bordered table-striped" style="width: 1000px;">
                          <thead style="background-color: antiquewhite;">
                              <tr>
                                <th style="width: 100px;">#</th>
                                <th>Atribut</th>
                                <th>Nilai</th>
                                <th>Level</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $no=1;
                            $id=1;
                            foreach($cvm as $cm){ ?>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>CVM<?= $id++; ?></td>
                              <td><?= $cm['CVM1'] ?></td>
                              <td><?= floor($cm['CVM1']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>CVM<?= $id++; ?></td>
                              <td><?= $cm['CVM2'] ?></td>
                              <td><?= floor($cm['CVM2']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>CVM<?= $id++; ?></td>
                              <td><?= $cm['CVM3'] ?></td>
                              <td><?= floor($cm['CVM3']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>CVM<?= $id++; ?></td>
                              <td><?= $cm['CVM5'] ?></td>
                              <td><?= floor($cm['CVM5']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>CVM<?= $id++; ?></td>
                              <td><?= $cm['CVM6'] ?></td>
                              <td><?= floor($cm['CVM6']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>CVM<?= $id++; ?></td>
                              <td><?= $cm['CVM7'] ?></td>
                              <td><?= floor($cm['CVM7']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>CVM<?= $id++; ?></td>
                              <td><?= $cm['CVM8'] ?></td>
                              <td><?= floor($cm['CVM8']); ?></td>
                            </tr>
                            <tr>
                              <!-- <td></td> -->
                              <td colspan="2" style="text-align: center ;">Tingkat Kematangan Domain CVM</td>
                              <td><?= $cm['total']; ?></td>
                              <td><?= floor($cm['total']); ?></td>
                            </tr>
                            <?php } ?>
                          </tbody>
                      </table>
                <br>
                <br>
                <p>Domain Tata Kelola (GOV)</p>
                      <table class="table table-bordered table-striped" style="width: 1000px;">
                          <thead style="background-color: antiquewhite;">
                              <tr>
                                <th style="width: 100px;">#</th>
                                <th>Atribut</th>
                                <th>Nilai</th>
                                <th>Level</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $no=1;
                            $id=1;
                            foreach($gov as $cm){ ?>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>GOV<?= $id++; ?></td>
                              <td><?= $cm['GOV1'] ?></td>
                              <td><?= floor($cm['GOV1']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>GOV<?= $id++; ?></td>
                              <td><?= $cm['GOV2'] ?></td>
                              <td><?= floor($cm['GOV2']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>GOV<?= $id++; ?></td>
                              <td><?= $cm['GOV3'] ?></td>
                              <td><?= floor($cm['GOV3']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>GOV<?= $id++; ?></td>
                              <td><?= $cm['GOV5'] ?></td>
                              <td><?= floor($cm['GOV5']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>GOV<?= $id++; ?></td>
                              <td><?= $cm['GOV6'] ?></td>
                              <td><?= floor($cm['GOV6']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>GOV<?= $id++; ?></td>
                              <td><?= $cm['GOV7'] ?></td>
                              <td><?= floor($cm['GOV7']); ?></td>
                            </tr>
                            <tr>
                              <!-- <td></td> -->
                              <td colspan="2" style="text-align: center ;">Tingkat Kematangan Domain GOV</td>
                              <td><?= $cm['total']; ?></td>
                              <td><?= floor($cm['total']); ?></td>
                            </tr>
                            <?php } ?>
                          </tbody>
                      </table>
                <br>
                <br>
                <p>Domain Kemitraan Bisnis Dengan TI (PAR)</p>
                      <table class="table table-bordered table-striped" style="width: 1000px;">
                          <thead style="background-color: antiquewhite;">
                              <tr>
                                <th style="width: 100px;">#</th>
                                <th>Atribut</th>
                                <th>Nilai</th>
                                <th>Level</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $no=1;
                            $id=1;
                            foreach($par as $cm){ ?>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>PAR<?= $id++; ?></td>
                              <td><?= $cm['PAR1'] ?></td>
                              <td><?= floor($cm['PAR1']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>PAR<?= $id++; ?></td>
                              <td><?= $cm['PAR2'] ?></td>
                              <td><?= floor($cm['PAR2']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>PAR<?= $id++; ?></td>
                              <td><?= $cm['PAR3'] ?></td>
                              <td><?= floor($cm['PAR3']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>PAR<?= $id++; ?></td>
                              <td><?= $cm['PAR4'] ?></td>
                              <td><?= floor($cm['PAR4']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>PAR<?= $id++; ?></td>
                              <td><?= $cm['PAR5'] ?></td>
                              <td><?= floor($cm['PAR5']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>PAR<?= $id++; ?></td>
                              <td><?= $cm['PAR6'] ?></td>
                              <td><?= floor($cm['PAR6']); ?></td>
                            </tr>
                            <tr>
                              <!-- <td></td> -->
                              <td colspan="2" style="text-align: center ;">Tingkat Kematangan Domain PAR</td>
                              <td><?= $cm['total']; ?></td>
                              <td><?= floor($cm['total']); ?></td>
                            </tr>
                            <?php } ?>
                          </tbody>
                      </table>
                <br>
                <br>
                <p>Domain Ruang Lingkup Dan Arsitektur (SAR)</p>
                      <table class="table table-bordered table-striped" style="width: 1000px;">
                          <thead style="background-color: antiquewhite;">
                              <tr>
                                <th style="width: 100px;">#</th>
                                <th>Atribut</th>
                                <th>Nilai</th>
                                <th>Level</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $no=1;
                            $id=1;
                            foreach($sar as $cm){ ?>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>SAR<?= $id++; ?></td>
                              <td><?= $cm['SAR1'] ?></td>
                              <td><?= floor($cm['SAR1']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>SAR<?= $id++; ?></td>
                              <td><?= $cm['SAR2'] ?></td>
                              <td><?= floor($cm['SAR2']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>SAR<?= $id++; ?></td>
                              <td><?= $cm['SAR3'] ?></td>
                              <td><?= floor($cm['SAR3']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>SAR<?= $id++; ?></td>
                              <td><?= $cm['SAR4'] ?></td>
                              <td><?= floor($cm['SAR4']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>SAR<?= $id++; ?></td>
                              <td><?= $cm['SAR5'] ?></td>
                              <td><?= floor($cm['SAR5']); ?></td>
                            </tr>
                              <!-- <td></td> -->
                              <td colspan="2" style="text-align: center ;">Tingkat Kematangan Domain SAR</td>
                              <td><?= $cm['total']; ?></td>
                              <td><?= floor($cm['total']); ?></td>
                            </tr>
                            <?php } ?>
                          </tbody>
                      </table>
                <br>
                <br>
                <p>Domain Keahlian Sumber Daya Manusia (SKI)</p>
                      <table class="table table-bordered table-striped" style="width: 1000px;">
                          <thead style="background-color: antiquewhite;">
                              <tr>
                                <th style="width: 100px;">#</th>
                                <th>Atribut</th>
                                <th>Nilai</th>
                                <th>Level</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $no=1;
                            $id=1;
                            foreach($ski as $cm){ ?>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>SKI<?= $id++; ?></td>
                              <td><?= $cm['SKI1'] ?></td>
                              <td><?= floor($cm['SKI1']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>SKI<?= $id++; ?></td>
                              <td><?= $cm['SKI2'] ?></td>
                              <td><?= floor($cm['SKI2']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>SKI<?= $id++; ?></td>
                              <td><?= $cm['SKI3'] ?></td>
                              <td><?= floor($cm['SKI3']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>SKI<?= $id++; ?></td>
                              <td><?= $cm['SKI4'] ?></td>
                              <td><?= floor($cm['SKI4']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>SKI<?= $id++; ?></td>
                              <td><?= $cm['SKI5'] ?></td>
                              <td><?= floor($cm['SKI5']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>SKI<?= $id++; ?></td>
                              <td><?= $cm['SKI6'] ?></td>
                              <td><?= floor($cm['SKI6']); ?></td>
                            </tr>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td>SKI<?= $id++; ?></td>
                              <td><?= $cm['SKI7'] ?></td>
                              <td><?= floor($cm['SKI7']); ?></td>
                            </tr>
                              <!-- <td></td> -->
                              <td colspan="2" style="text-align: center ;">Tingkat Kematangan Domain SKI</td>
                              <td><?= $cm['total']; ?></td>
                              <td><?= floor($cm['total']); ?></td>
                            </tr>
                            <?php } ?>
                          </tbody>
                      </table>
                <br>
                <br>
                <hr>
                <p><b>Hasil Tingkat Kematangan Secara Keseluruhan Kriteria / Domain</b></p>
                <hr>
                <table id="hasil" class="table table-bordered table-striped" style="width: 1220px;">
                  <thead style="background-color: coral;">
                    <tr>
                      <th>#</th>
                      <th>Kriteria</th>
                      <th>Nilai Kematangan</th>
                      <th>Nilai Tingkat Kematangan</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no=1;
                    $id=1;
                    foreach($criteria as $crit)
                    {
                      // $no++;
                    ?>
                    <tr>
                      <td><?= $id++; ?></td>
                      <td><?= $crit['label'];?></td>
                      <td><?= $crit['total']; ?></td>
                      <td><?= $crit['kematangan'];?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                      <td colspan="2">Nilai Kematangan</td>
                      <td><?= $total_keseluruhan; ?></td>
                      <td><?= floor($total_keseluruhan); ?></td>
                    </tr>
                  </tbody>
                </table>
              <br>
              <hr>
              <p><b>Grafik Hasil Survey</b></p>
              <hr>
              <div class="card col-md-6">
                <div class="body-card" style="width: 358px;">
                <canvas id="chart-line" width="1000" height="400"></canvas>               
                </div>
                <br>
              </div>
              </div>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->

    