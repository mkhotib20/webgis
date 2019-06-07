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
											<td>105,09630 Ha </td>
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
											<td>6 Bulan</td>
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
										<td>Fasum</td>
										<td>8,75151</td>
										<td>8%</td>
									</tr>
									<tr>
										<td>Pariwisata</td>
										<td>1,895312</td>
										<td>2%</td>
									</tr>
									<tr>
										<td>Pemukiman</td>
										<td>49,839344</td>
										<td>47%</td>
									</tr>
									<tr>
										<td>Perekonomian</td>
										<td>1,40424</td>
										<td>1%</td>
									</tr>
									<tr>
										<td>Pelayanan Jasa</td>
										<td>1,15367</td>
										<td>1%</td>
									</tr>
									<tr>
										<td>Sawah</td>
										<td>42,052219</td>
										<td>40%</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="col-md-6">
						<h5>Presentase Penggunaan Lahan</h5>
							<br>
							<img style="width: 100%" src="<?php echo base_url('assets/img/presentase/pengLahanBal.png') ?>" alt="">
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
										<td>4187</td>
										<td>4259</td>
										<td>8446</td>
									</tr>
								</tbody>
							</table>
							<img style="width: 100%" src="<?php echo base_url('assets/img/presentase/jpBal.png') ?>" alt="">
							<p>Kepadatan penduduk : 8.036,44 Jiwa/Km<sup>2</sup></p>
							
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
										<td>2320</td>
										<td>2472</td>
										<td>4792</td>
									</tr>
								</tbody>
							</table>	
							<img style="width: 100%" src="<?php echo base_url('assets/img/presentase/angkatanKerjaBal.png') ?>" alt="">
						</div>
					</div>
					<br>
					<h3 id="potensiEkonomi" >Potensi Ekonomi dan Wisata</h3>
					<br>
					<div class="row">
						<div class="col-md-4">
							<img style="width: 100%" src="<?php echo base_url('assets/img/potensi/ondeBal.jpg') ?>" alt="">
							<br><br>
							<h5>Pusat oleh-oleh Onde-Onde Bo Liem</h5>
							<p>Onde-Onde Keciput Yanik atau dikenal dengan nama “Boliem” merupakan tempaat wisata kuliner yang terkenal dengan jajanan onde-onde khas Mojokertonya. Toko ini mudah ditemukan karena berada tepat di seberang jalan di depan Kantor Kelurahan Balongsari.</p>
						</div>
						<div class="col-md-4">
							<img style="width: 100%" src="<?php echo base_url('assets/img/potensi/sunrise.jpg') ?>" alt="">
							<br><br>
							<h5>Sunrise Mall</h5>
							<p>Sunrise Mall merupakan sebuah mall yang berda di Kota Mojokerto. Dibuka sejak tahun 2017. Terletak di Jl. Benteng Pancasila, Lingkungan Gembongsari, Kelurahan Balongsari. Hampir sama dengan Big Market atau Mall lainnya, terdapat outlet-outlet terkenal maupun barang-barang kebutuhan sehari-hari. Keberadaan Sunrise Mall meningkatkan perekonomian di Kota Mojokerto lebih baik dibandingkan tahun-tahun sebelumnya.</p>
						</div>
						<div class="col-md-4">
							<img style="width: 100%" src="" alt="foto potensi">
							<br><br>
							<h5>UMKM Kerajinan Daur Ulang</h5>
						</div>
					</div>
				</div>