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
											<td>177,1964 Ha </td>
										</tr>
										<tr>
											<td>Daratan Rendah </td>
											<td>Ya </td>
										</tr>
										<tr>
											<td>Tekstur Tanah </td>
											<td>Pasiran </td>
										</tr>
										<tr>
											<td>Tingkat Kemiringan </td>
											<td>2 Derajat </td>
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
											<td>4,20 mm</td>
										</tr>
										<tr>
											<td>Jumlah bulan hujan</td>
											<td>5 Bulan</td>
										</tr>
										<tr>
											<td>Kelembaban</td>
											<td>93 RH</td>
										</tr>
										<tr>
											<td>Suhu rata - rata Harian</td>
											<td>33˚C</td>
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
										<td>126,0440</td>
										<td>71,13%</td>
									</tr>
									<tr>
										<td>Ekonomi & Wisata</td>
										<td>3,1408</td>
										<td>1,77%</td>
									</tr>
									<tr>
										<td>Fasum</td>
										<td>18,7667</td>
										<td>10,59%</td>
									</tr>
									<tr>
										<td>Sawah</td>
										<td>23,3216</td>
										<td>13,16%</td>
									</tr>
									<tr>
										<td>Pengairan</td>
										<td>5,9234</td>
										<td>3,34%</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="col-md-6">
						<h5>Presentase Penggunaan Lahan</h5>
							<br>
							<img style="width: 100%" src="<?php echo base_url('assets/img/presentase/pengLahanWat.png') ?>" alt="">
						</div>
					</div>
					<br>
					<h3 id="potensiSDM" >Potensi Sumber Daya Manusia</h3>
					<div class="row">
						<div class="col-md-6">
							<h5>Penduduk Keseluruhan</h5>
							<table class="table table-hover table-striped table-bordered" >
								<thead>
									<th>Laki - Laki</th>
									<th>Perempuan</th>
									<th>Laki - Laki + Perempuan</th>
								</thead>
								<tbody>
									<tr>
										<td>10420</td>
										<td>10668</td>
										<td>21088</td>
									</tr>
								</tbody>
							</table>
							<img style="width: 100%" src="<?php echo base_url('assets/img/presentase/jpWat.png') ?>" alt="">
							<p>Kepadatan penduduk : 5.740,52 Jiwa/Km<sup>2</sup></p>
							
						</div>
						<div class="col-md-6">
							<h5>Penduduk Angkatan Kerja</h5>
							<table class="table table-hover table-striped table-bordered" >
								<thead>
									<th>Laki - Laki</th>
									<th>Perempuan</th>
									<th>Laki - Laki + Perempuan</th>
								</thead>
								<tbody>
									<tr>
										<td>5369</td>
										<td>4803</td>
										<td>10172</td>
									</tr>
								</tbody>
							</table>	
							<img style="width: 100%" src="<?php echo base_url('assets/img/presentase/angkatanKerjaWat.png') ?>" alt="">
						</div>
						<div class="col-md-6">
							<h5>Angkatan Kerja Pendidikan SLTA & PT</h5>
							<table class="table table-hover table-striped table-bordered" >
								<thead>
									<th>Laki - Laki</th>
									<th>Perempuan</th>
									<th>Laki - Laki + Perempuan</th>
								</thead>
								<tbody>
									<tr>
										<td>1985</td>
										<td>1600</td>
										<td>3585</td>
									</tr>
								</tbody>
							</table>
							<img style="width: 100%" src="<?php echo base_url('assets/img/presentase/angKerjaPTN.png') ?>" alt="">
						</div>
					</div>
					<br>
					<h3 id="potensiEkonomi" >Potensi Ekonomi dan Wisata</h3>
					<br>
					<div class="row">
						<div class="col-md-3">
							<img style="height: 300px" src="<?php echo base_url('assets/img/potensi/akikWat.jpg') ?>" alt="">
							<br><br>
							<h5>Kerajinan Batu Akik Lintang Jagad</h5>
							<p>Lintang Jagad Galery merupakan sebuah usaha di bidang kerajinan batu akik yang dimulai pada awal tahun 2014. 
							Usaha ini berada di lingkungan Bancang, Kelurahan Wates.</p>
						</div>
						<div class="col-md-3">
							<img style="height: 300px" src="<?php echo base_url('assets/img/potensi/potWat.jpg') ?>" alt="">
							<br><br>
							<h5>Kerajinan Pot Tanaman</h5>
						</div>
						<div class="col-md-3">
							<img style="height: 300px" src="<?php echo base_url('assets/img/potensi/kerWat.jpg') ?>" alt="">
							<br><br>
							<h5>Krupuk Cassava</h5>
							<p>Didirak sejak tahun 2005 oleh Ibu Anik Agustiani dan Bapak Yohane Suseno. Produk ini berhasil didistribusikan hampis seluruh wilayah Jawa dan beberapa daerah lainnya dengan omset mencapai 75 juta tiap bulannya.</p>
						</div>
						<div class="col-md-3">
							<img style="height: 300px" src="<?php echo base_url('assets/img/potensi/mebWat.jpg') ?>" alt="">
							<br><br>
							<h5>Mebel UD. Difani Bima</h5>
							<p>Didirak sejak tahun 2005 oleh Ibu Anik Agustiani dan Bapak Yohane Suseno. Produk ini berhasil didistribusikan hampis seluruh wilayah Jawa dan beberapa daerah lainnya dengan omset mencapai 75 juta tiap bulannya.</p>
						</div>
					</div>
				</div>