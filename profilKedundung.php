<div class="konten">
					<h3 id="sejarah">Sejarah dan asal usul nama </h3>
					<p><?php echo $kel['sejarah'] ?></p>
					<br>
					<h3 id="batas" >Batas Wilayah</h3>
					<table class="table table-hover table-striped table-bordered" >
							<thead>
								<th>Batas</th>
								<th>Kelurahan / Desa</th>
								<th>Kecamatan</th>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $kel['batas_utara']['arah'] ?></td>
									<td><?php echo $kel['batas_utara']['kel'] ?></td>
									<td><?php echo $kel['batas_utara']['kec'] ?></td>
								</tr>
								<tr>
									<td><?php echo $kel['batas_selatan']['arah'] ?></td>
									<td><?php echo $kel['batas_selatan']['kel'] ?></td>
									<td><?php echo $kel['batas_selatan']['kec'] ?></td>
								</tr>
								<tr>
									<td><?php echo $kel['batas_barat']['arah'] ?></td>
									<td><?php echo $kel['batas_barat']['kel'] ?></td>
									<td><?php echo $kel['batas_barat']['kec'] ?></td>
								</tr>
								<tr>
									<td><?php echo $kel['batas_timur']['arah'] ?></td>
									<td><?php echo $kel['batas_timur']['kel'] ?></td>
									<td><?php echo $kel['batas_timur']['kec'] ?></td>
								</tr>
							</tbody>
					</table>
					<br>
					<h3 id="potensiUmum" >Potensi Umum</h3>
					<div class="row">
						<div class="col-md-6">
							<h5>Topografi</h5>
							<table class="table table-hover table-striped table-bordered" >
									<tbody>
										<tr>
											<td>Luas </td>
											<td>265,52 Ha </td>
										</tr>
										<tr>
											<td>Daratan Rendah </td>
											<td>Ya </td>
										</tr>
										<tr>
											<td>Tekstur Tanah </td>
											<td>Lempungan </td>
										</tr>
										<tr>
											<td>Tingkat Kemiringan </td>
											<td>3 Derajat </td>
										</tr>
									</tbody>
							</table>
						</div>
						<div class="col-md-6">
							<h5>Iklim dan Cuaca</h5>
							<table class="table table-hover table-striped table-bordered" >
									<tbody>
										<tr>
											<td>Curah Hujan</td>
											<td>4,00 mm</td>
										</tr>
										<tr>
											<td>Jumlah bulan hujan</td>
											<td>6 Bulan</td>
										</tr>
										<tr>
											<td>Kelembaban</td>
											<td>37 RH</td>
										</tr>
										<tr>
											<td>Suhu rata - rata Harian</td>
											<td>21˚C</td>
										</tr>
										<tr>
											<td>Elevasi</td>
											<td>22 mdpl</td>
										</tr>
									</tbody>
							</table>
						</div>
						<div class="col-md-6">
							<h5>Presentase Penggunaan Lahan</h5>
							<table class="table table-hover table-striped table-bordered" >
								<thead>
									<th>Kategori Penggunaan</th>
									<th>Luas (Ha)</th>
									<th>Presentase </th>
								</thead>	
								<tbody>
									<tr>
										<td>Pemukiman</td>
										<td>123.74291</td>
										<td>46.6%</td>
									</tr>
									<tr>
										<td>Fasilitas Umum</td>
										<td>20.617774</td>
										<td>7,8%</td>
									</tr>
									<tr>
										<td>Pengairan</td>
										<td>2.06197</td>
										<td>0.8%</td>
									</tr>
									<tr>
										<td>Ekonomi</td>
										<td>3.655682</td>
										<td>1.4%</td>
									</tr>
									<tr>
										<td>Persawahan</td>
										<td>115.480337</td>
										<td>43.5%</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="col-md-6">
						<h5>Presentase Penggunaan Lahan</h5>
							<br>
							<img style="width: 100%" src="<?php echo base_url('assets/img/presentase/pengLahanKd.png') ?>" alt="">
						</div>
					</div>
					<br>
					<h3 id="potensiSDM" >Potensi Sumber Daya Manusia</h3>
					<div class="row">
						<div class="col-md-6">
							<h5>Penduduk Keseluruhan</h5>
							<p>Kepadatan penduduk : 6.022,14 Jiwa/Km <sup>2</sup></p>
							
							<img style="width: 100%" src="<?php echo base_url('assets/img/presentase/jpKd.png') ?>" alt="">
							<table class="table table-hover table-striped table-bordered" >
								<thead>
									<th>Laki - Laki</th>
									<th>Perempuan</th>
									<th>Laki - Laki + Perempuan</th>
								</thead>
								<tbody>
									<tr>
										<td>8104</td>
										<td>7886</td>
										<td>15990</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="col-md-6">
							<h5>Penduduk Angkatan Kerja</h5>
							<p>Jumlah: 10.008 Jiwa</p>
							<img style="width: 100%" src="<?php echo base_url('assets/img/presentase/angkatanKerjaKd.png') ?>" alt="">
						</div>
						<div class="col-md-6">
							<h5>Angkatan Kerja dengan Pendidikan SLTA dan Perguruan Tinggi</h5>
							<p>Jumlah: 5.960</p>
							<img style="width: 100%" src="<?php echo base_url('assets/img/presentase/angKerjaPTNKd.png') ?>" alt="">
						</div>
					</div>
					<br>
					<h3 id="potensiEkonomi" >Potensi Ekonomi dan Wisata</h3>
					<br>
					<div class="row kd">
						<div class="col-md-4">
							<img style="width: 100%" src="<?php echo base_url('assets/img/potensi/tpaKd.jpg') ?>" alt="">
							<br><br>
							<h5>TPA Wisata Randegan</h5>
							<p>Selain sebagai Tempat Pembuangan Akhir limbah, juga menyediakan wisata edukasi pengolahan 
							limbah (komposter, pembuatan biogas, bank sampah induk). Berdiri sejak 1990, kemudian mengalami revitalisasi pada
							 tahun 2016 atas ide bapak Amin Wachid (Kepala TPA)</p>
						</div>
						<div class="col-md-4">
							<img style="width: 100%" src="<?php echo base_url('assets/img/potensi/makamKd.jpg') ?>" alt="">
							<br><br>
							<h5>Makam Mbah Corowo</h5>
							<p>Wisata religi dan sejarah berupa kawasan pemakaman sesepuh Randegan. Berisi beberapa makam antara lain, 
							makam Mbah Corowo, Mbah Jagung, dan Mbah Riwuk</p>
						</div>
						<div class="col-md-4">
							<img style="width: 100%" src="<?php echo base_url('assets/img/potensi/ukmKd.jpg') ?>" alt="">
							<br><br>
							<h5>UMKM: UMKM Kerajinan  tas dari limbah kertas, UMKM Amplas</h5>
						</div>
					</div>
				</div>