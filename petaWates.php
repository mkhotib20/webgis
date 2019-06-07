<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link rel="stylesheet" href="<?php echo base_url('assets/wates/') ?>css/leaflet.css"><link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css"><link rel="stylesheet" href="<?php echo base_url('assets/wates/') ?>css/L.Control.Locate.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/wates/') ?>css/qgis2web.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/wates/') ?>css/leaflet-search.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/wates/') ?>css/leaflet-measure.css">
        <?php include 'foot.php' ?>
        <style>
        html, body, #map {
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
        }
        </style>
        <title></title>
    </head>
    <body>
    <?php include 'nav.php' ?>
    <section class="kecamatan" >
        <div class="row">
            <div class="col-md-12">
                <center>
                    <h2>Peta Potensi Kelurahan Wates</h2>
                    <p><a href="<?php echo base_url('profile-kelurahan/wates') ?>">Profil Kelurahan <span class="fas fa-angle-double-right"></span></a></p>
                </center>
            </div>
            <div class="col-md-12">
                <div style="height: 550px;" id="map"></div>
            </div>
        </div>
    </section>
        <script src="<?php echo base_url('assets/wates/') ?>js/qgis2web_expressions.js"></script>
        <script src="<?php echo base_url('assets/wates/') ?>js/leaflet.js"></script><script src="<?php echo base_url('assets/wates/') ?>js/L.Control.Locate.min.js"></script>
        <script src="<?php echo base_url('assets/wates/') ?>js/leaflet.rotatedMarker.js"></script>
        <script src="<?php echo base_url('assets/wates/') ?>js/leaflet.pattern.js"></script>
        <script src="<?php echo base_url('assets/wates/') ?>js/leaflet-hash.js"></script>
        <script src="<?php echo base_url('assets/wates/') ?>js/Autolinker.min.js"></script>
        <script src="<?php echo base_url('assets/wates/') ?>js/rbush.min.js"></script>
        <script src="<?php echo base_url('assets/wates/') ?>js/labelgun.min.js"></script>
        <script src="<?php echo base_url('assets/wates/') ?>js/labels.js"></script>
        <script src="<?php echo base_url('assets/wates/') ?>js/leaflet-measure.js"></script>
        <script src="<?php echo base_url('assets/wates/') ?>js/leaflet-search.js"></script>
        <script src="<?php echo base_url('assets/wates/') ?>data/TutupanLahan_1.js"></script>
        <script src="<?php echo base_url('assets/wates/') ?>data/Kelurahan_2.js"></script>
        <script src="<?php echo base_url('assets/wates/') ?>data/Lingkungan_3.js"></script>
        <script src="<?php echo base_url('assets/wates/') ?>data/RW_4.js"></script>
        <script src="<?php echo base_url('assets/wates/') ?>data/RT_5.js"></script>
        <script src="<?php echo base_url('assets/wates/') ?>data/BatasWilayah_6.js"></script>
        <script src="<?php echo base_url('assets/wates/') ?>data/Toponimi_7.js"></script>
        <script>
        var highlightLayer;
        function highlightFeature(e) {
            highlightLayer = e.target;

            if (e.target.feature.geometry.type === 'LineString') {
              highlightLayer.setStyle({
                color: '#ffff00',
              });
            } else {
              highlightLayer.setStyle({
                fillColor: '#ffff00',
                fillOpacity: 1
              });
            }
            highlightLayer.openPopup();
        }
        var map = L.map('map', {
            zoomControl:true, maxZoom:28, minZoom:1
        }).fitBounds([[-7.46368160675,112.436404807],[-7.44703735878,112.468935853]]);
        var hash = new L.Hash(map);
        map.attributionControl.addAttribution('<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a>');
        L.control.locate().addTo(map);
        var measureControl = new L.Control.Measure({
            primaryLengthUnit: 'meters',
            secondaryLengthUnit: 'kilometers',
            primaryAreaUnit: 'sqmeters',
            secondaryAreaUnit: 'hectares'
        });
        measureControl.addTo(map);
        var bounds_group = new L.featureGroup([]);
        function setBounds() {
        }
        var overlay_GoogleSatellite_0 = L.tileLayer(' https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
            opacity: 1.0
        });
        overlay_GoogleSatellite_0.addTo(map);
        map.addLayer(overlay_GoogleSatellite_0);
        function pop_TutupanLahan_1(feature, layer) {
            layer.on({
                mouseout: function(e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                    if (typeof layer.closePopup == 'function') {
                        layer.closePopup();
                    } else {
                        layer.eachLayer(function(feature){
                            feature.closePopup()
                        });
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">Kelas PL</th>\
                        <td>' + (feature.properties['Kelas PL'] !== null ? Autolinker.link(String(feature.properties['Kelas PL'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Toponimi</th>\
                        <td>' + (feature.properties['Toponimi'] !== null ? Autolinker.link(String(feature.properties['Toponimi'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Luas (Ha)</th>\
                        <td>' + (feature.properties['Luas (Ha)'] !== null ? Autolinker.link(String(feature.properties['Luas (Ha)'])) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_TutupanLahan_1_0(feature) {
            switch(String(feature.properties['Kelas PL'])) {
                case 'Jalan':
                    return {
                pane: 'pane_TutupanLahan_1',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(227,26,28,1.0)',
            }
                    break;
                case 'Kesehatan':
                    return {
                pane: 'pane_TutupanLahan_1',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(232,181,191,1.0)',
            }
                    break;
                case 'Kolam':
                    return {
                pane: 'pane_TutupanLahan_1',
                opacity: 1,
                color: 'rgba(0,255,255,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(204,255,255,1.0)',
            }
                    break;
                case 'Lahan Terbuka':
                    return {
                pane: 'pane_TutupanLahan_1',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(255,255,255,1.0)',
            }
                    break;
                case 'Monumen':
                    return {
                pane: 'pane_TutupanLahan_1',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(255,77,255,1.0)',
            }
                    break;
                case 'Olahraga':
                    return {
                pane: 'pane_TutupanLahan_1',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(237,204,125,1.0)',
            }
                    break;
                case 'Pariwisata':
                    return {
                pane: 'pane_TutupanLahan_1',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(201,148,232,1.0)',
            }
                    break;
                case 'Pekarangan':
                    return {
                pane: 'pane_TutupanLahan_1',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(255,255,153,1.0)',
            }
                    break;
                case 'Pemakaman':
                    return {
                pane: 'pane_TutupanLahan_1',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(143,143,143,1.0)',
            }
                    break;
                case 'Pemukiman':
                    return {
                pane: 'pane_TutupanLahan_1',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(255,204,191,1.0)',
            }
                    break;
                case 'Pendidikan':
                    return {
                pane: 'pane_TutupanLahan_1',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(222,204,161,1.0)',
            }
                    break;
                case 'Perbankan':
                    return {
                pane: 'pane_TutupanLahan_1',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(232,232,156,1.0)',
            }
                    break;
                case 'Perdagangan & Jasa':
                    return {
                pane: 'pane_TutupanLahan_1',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(255,201,214,1.0)',
            }
                    break;
                case 'Peribadatan':
                    return {
                pane: 'pane_TutupanLahan_1',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(166,161,186,1.0)',
            }
                    break;
                case 'Perkantoran':
                    return {
                pane: 'pane_TutupanLahan_1',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(199,153,122,1.0)',
            }
                    break;
                case 'Sanitasi':
                    return {
                pane: 'pane_TutupanLahan_1',
                opacity: 1,
                color: 'rgba(0,112,255,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(115,179,255,1.0)',
            }
                    break;
                case 'Sawah':
                    return {
                pane: 'pane_TutupanLahan_1',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(153,248,166,1.0)',
            }
                    break;
                case 'Sungai':
                    return {
                pane: 'pane_TutupanLahan_1',
                opacity: 1,
                color: 'rgba(0,255,255,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(204,255,255,1.0)',
            }
                    break;
                case 'Telekomunikasi':
                    return {
                pane: 'pane_TutupanLahan_1',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(255,189,77,1.0)',
            }
                    break;
                case 'Industri dan Pergudangan':
                    return {
                pane: 'pane_TutupanLahan_1',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(255,176,133,1.0)',
            }
                    break;
                case 'Sosial Budaya':
                    return {
                pane: 'pane_TutupanLahan_1',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(255,143,89,1.0)',
            }
                    break;
            }
        }
        map.createPane('pane_TutupanLahan_1');
        map.getPane('pane_TutupanLahan_1').style.zIndex = 401;
        map.getPane('pane_TutupanLahan_1').style['mix-blend-mode'] = 'normal';
        var layer_TutupanLahan_1 = new L.geoJson(json_TutupanLahan_1, {
            attribution: '<a href=""></a>',
            pane: 'pane_TutupanLahan_1',
            onEachFeature: pop_TutupanLahan_1,
            style: style_TutupanLahan_1_0,
        });
        bounds_group.addLayer(layer_TutupanLahan_1);
        map.addLayer(layer_TutupanLahan_1);
        function pop_Kelurahan_2(feature, layer) {
            layer.on({
                mouseout: function(e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                    if (typeof layer.closePopup == 'function') {
                        layer.closePopup();
                    } else {
                        layer.eachLayer(function(feature){
                            feature.closePopup()
                        });
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">Kelurahan</th>\
                        <td>' + (feature.properties['Kelurahan'] !== null ? Autolinker.link(String(feature.properties['Kelurahan'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Kecamatan</th>\
                        <td>' + (feature.properties['Kecamatan'] !== null ? Autolinker.link(String(feature.properties['Kecamatan'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Kota</th>\
                        <td>' + (feature.properties['Kota'] !== null ? Autolinker.link(String(feature.properties['Kota'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Luas (Ha)</th>\
                        <td>' + (feature.properties['Luas (Ha)'] !== null ? Autolinker.link(String(feature.properties['Luas (Ha)'])) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_Kelurahan_2_0(feature) {
            switch(String(feature.properties['Kelurahan'])) {
                case 'KEL. WATES':
                    return {
                pane: 'pane_Kelurahan_2',
                opacity: 1,
                color: 'rgba(0,0,0,0.15)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(71,233,93,0.15)',
            }
                    break;
            }
        }
        map.createPane('pane_Kelurahan_2');
        map.getPane('pane_Kelurahan_2').style.zIndex = 402;
        map.getPane('pane_Kelurahan_2').style['mix-blend-mode'] = 'normal';
        var layer_Kelurahan_2 = new L.geoJson(json_Kelurahan_2, {
            attribution: '<a href=""></a>',
            pane: 'pane_Kelurahan_2',
            onEachFeature: pop_Kelurahan_2,
            style: style_Kelurahan_2_0,
        });
        bounds_group.addLayer(layer_Kelurahan_2);
        map.addLayer(layer_Kelurahan_2);
        function pop_Lingkungan_3(feature, layer) {
            layer.on({
                mouseout: function(e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                    if (typeof layer.closePopup == 'function') {
                        layer.closePopup();
                    } else {
                        layer.eachLayer(function(feature){
                            feature.closePopup()
                        });
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">Lingkungan</th>\
                        <td>' + (feature.properties['Lingkungan'] !== null ? Autolinker.link(String(feature.properties['Lingkungan'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Kelurahan</th>\
                        <td>' + (feature.properties['Kelurahan'] !== null ? Autolinker.link(String(feature.properties['Kelurahan'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Kecamatan</th>\
                        <td>' + (feature.properties['Kecamatan'] !== null ? Autolinker.link(String(feature.properties['Kecamatan'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Kota</th>\
                        <td>' + (feature.properties['Kota'] !== null ? Autolinker.link(String(feature.properties['Kota'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Luas (Ha)</th>\
                        <td>' + (feature.properties['Luas (Ha)'] !== null ? Autolinker.link(String(feature.properties['Luas (Ha)'])) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_Lingkungan_3_0(feature) {
            switch(String(feature.properties['Lingkungan'])) {
                case 'BANCANG':
                    return {
                pane: 'pane_Lingkungan_3',
                opacity: 1,
                color: 'rgba(0,0,0,0.6)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(0,0,4,0.6)',
            }
                    break;
                case 'BANJAR ANYAR':
                    return {
                pane: 'pane_Lingkungan_3',
                opacity: 1,
                color: 'rgba(0,0,0,0.6)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(51,9,94,0.6)',
            }
                    break;
                case 'KARANGLO':
                    return {
                pane: 'pane_Lingkungan_3',
                opacity: 1,
                color: 'rgba(0,0,0,0.6)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(120,28,109,0.6)',
            }
                    break;
                case 'PERUMAHAN BARAT':
                    return {
                pane: 'pane_Lingkungan_3',
                opacity: 1,
                color: 'rgba(0,0,0,0.6)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(187,55,84,0.6)',
            }
                    break;
                case 'PERUMAHAN TENGAH':
                    return {
                pane: 'pane_Lingkungan_3',
                opacity: 1,
                color: 'rgba(0,0,0,0.6)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(237,105,37,0.6)',
            }
                    break;
                case 'PERUMAHAN TIMUR':
                    return {
                pane: 'pane_Lingkungan_3',
                opacity: 1,
                color: 'rgba(0,0,0,0.6)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(252,181,25,0.6)',
            }
                    break;
                case 'WATES':
                    return {
                pane: 'pane_Lingkungan_3',
                opacity: 1,
                color: 'rgba(0,0,0,0.6)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(252,255,164,0.6)',
            }
                    break;
            }
        }
        map.createPane('pane_Lingkungan_3');
        map.getPane('pane_Lingkungan_3').style.zIndex = 403;
        map.getPane('pane_Lingkungan_3').style['mix-blend-mode'] = 'normal';
        var layer_Lingkungan_3 = new L.geoJson(json_Lingkungan_3, {
            attribution: '<a href=""></a>',
            pane: 'pane_Lingkungan_3',
            onEachFeature: pop_Lingkungan_3,
            style: style_Lingkungan_3_0,
        });
        bounds_group.addLayer(layer_Lingkungan_3);
        map.addLayer(layer_Lingkungan_3);
        function pop_RW_4(feature, layer) {
            layer.on({
                mouseout: function(e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                    if (typeof layer.closePopup == 'function') {
                        layer.closePopup();
                    } else {
                        layer.eachLayer(function(feature){
                            feature.closePopup()
                        });
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">RW</th>\
                        <td>' + (feature.properties['RW'] !== null ? Autolinker.link(String(feature.properties['RW'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Lingkungan</th>\
                        <td>' + (feature.properties['Lingkungan'] !== null ? Autolinker.link(String(feature.properties['Lingkungan'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Kelurahan</th>\
                        <td>' + (feature.properties['Kelurahan'] !== null ? Autolinker.link(String(feature.properties['Kelurahan'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Kecamatan</th>\
                        <td>' + (feature.properties['Kecamatan'] !== null ? Autolinker.link(String(feature.properties['Kecamatan'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Kota</th>\
                        <td>' + (feature.properties['Kota'] !== null ? Autolinker.link(String(feature.properties['Kota'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Luas (Ha)</th>\
                        <td>' + (feature.properties['Luas (Ha)'] !== null ? Autolinker.link(String(feature.properties['Luas (Ha)'])) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_RW_4_0(feature) {
            switch(String(feature.properties['RW'])) {
                case 'RW 01':
                    return {
                pane: 'pane_RW_4',
                opacity: 1,
                color: 'rgba(0,0,0,0.5)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(215,25,28,0.5)',
            }
                    break;
                case 'RW 02':
                    return {
                pane: 'pane_RW_4',
                opacity: 1,
                color: 'rgba(0,0,0,0.5)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(237,110,67,0.5)',
            }
                    break;
                case 'RW 03':
                    return {
                pane: 'pane_RW_4',
                opacity: 1,
                color: 'rgba(0,0,0,0.5)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(254,186,110,0.5)',
            }
                    break;
                case 'RW 04':
                    return {
                pane: 'pane_RW_4',
                opacity: 1,
                color: 'rgba(0,0,0,0.5)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(255,232,164,0.5)',
            }
                    break;
                case 'RW 05':
                    return {
                pane: 'pane_RW_4',
                opacity: 1,
                color: 'rgba(0,0,0,0.5)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(231,245,203,0.5)',
            }
                    break;
                case 'RW 06':
                    return {
                pane: 'pane_RW_4',
                opacity: 1,
                color: 'rgba(0,0,0,0.5)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(183,223,227,0.5)',
            }
                    break;
                case 'RW 07':
                    return {
                pane: 'pane_RW_4',
                opacity: 1,
                color: 'rgba(0,0,0,0.5)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(117,177,211,0.5)',
            }
                    break;
                case 'RW 08':
                    return {
                pane: 'pane_RW_4',
                opacity: 1,
                color: 'rgba(0,0,0,0.5)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(44,123,182,0.5)',
            }
                    break;
            }
        }
        map.createPane('pane_RW_4');
        map.getPane('pane_RW_4').style.zIndex = 404;
        map.getPane('pane_RW_4').style['mix-blend-mode'] = 'normal';
        var layer_RW_4 = new L.geoJson(json_RW_4, {
            attribution: '<a href=""></a>',
            pane: 'pane_RW_4',
            onEachFeature: pop_RW_4,
            style: style_RW_4_0,
        });
        bounds_group.addLayer(layer_RW_4);
        map.addLayer(layer_RW_4);
        function pop_RT_5(feature, layer) {
            layer.on({
                mouseout: function(e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                    if (typeof layer.closePopup == 'function') {
                        layer.closePopup();
                    } else {
                        layer.eachLayer(function(feature){
                            feature.closePopup()
                        });
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">RT</th>\
                        <td>' + (feature.properties['RT'] !== null ? Autolinker.link(String(feature.properties['RT'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">RW</th>\
                        <td>' + (feature.properties['RW'] !== null ? Autolinker.link(String(feature.properties['RW'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Lingkungan</th>\
                        <td>' + (feature.properties['Lingkungan'] !== null ? Autolinker.link(String(feature.properties['Lingkungan'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Kelurahan</th>\
                        <td>' + (feature.properties['Kelurahan'] !== null ? Autolinker.link(String(feature.properties['Kelurahan'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Kecamatan</th>\
                        <td>' + (feature.properties['Kecamatan'] !== null ? Autolinker.link(String(feature.properties['Kecamatan'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Kota</th>\
                        <td>' + (feature.properties['Kota'] !== null ? Autolinker.link(String(feature.properties['Kota'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Luas (Ha)</th>\
                        <td>' + (feature.properties['Luas (Ha)'] !== null ? Autolinker.link(String(feature.properties['Luas (Ha)'])) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_RT_5_0(feature) {
            switch(String(feature.properties['RT'])) {
                case 'RT 01':
                    return {
                pane: 'pane_RT_5',
                opacity: 1,
                color: 'rgba(0,0,0,0.4)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(99,227,152,0.4)',
            }
                    break;
                case 'RT 02':
                    return {
                pane: 'pane_RT_5',
                opacity: 1,
                color: 'rgba(0,0,0,0.4)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(216,159,118,0.4)',
            }
                    break;
                case 'RT 03':
                    return {
                pane: 'pane_RT_5',
                opacity: 1,
                color: 'rgba(0,0,0,0.4)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(201,11,122,0.4)',
            }
                    break;
                case 'RT 04':
                    return {
                pane: 'pane_RT_5',
                opacity: 1,
                color: 'rgba(0,0,0,0.4)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(81,218,69,0.4)',
            }
                    break;
                case 'RT 05':
                    return {
                pane: 'pane_RT_5',
                opacity: 1,
                color: 'rgba(0,0,0,0.4)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(56,140,200,0.4)',
            }
                    break;
                case 'RT 06':
                    return {
                pane: 'pane_RT_5',
                opacity: 1,
                color: 'rgba(0,0,0,0.4)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(233,126,135,0.4)',
            }
                    break;
                case 'RT 07':
                    return {
                pane: 'pane_RT_5',
                opacity: 1,
                color: 'rgba(0,0,0,0.4)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(209,195,39,0.4)',
            }
                    break;
                case 'RT 08':
                    return {
                pane: 'pane_RT_5',
                opacity: 1,
                color: 'rgba(0,0,0,0.4)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(159,106,229,0.4)',
            }
                    break;
                case 'RT 09':
                    return {
                pane: 'pane_RT_5',
                opacity: 1,
                color: 'rgba(0,0,0,0.4)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(199,105,205,0.4)',
            }
                    break;
                case 'RT 10':
                    return {
                pane: 'pane_RT_5',
                opacity: 1,
                color: 'rgba(0,0,0,0.4)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(16,206,190,0.4)',
            }
                    break;
                case 'RT 11':
                    return {
                pane: 'pane_RT_5',
                opacity: 1,
                color: 'rgba(0,0,0,0.4)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(112,120,211,0.4)',
            }
                    break;
            }
        }
        map.createPane('pane_RT_5');
        map.getPane('pane_RT_5').style.zIndex = 405;
        map.getPane('pane_RT_5').style['mix-blend-mode'] = 'normal';
        var layer_RT_5 = new L.geoJson(json_RT_5, {
            attribution: '<a href=""></a>',
            pane: 'pane_RT_5',
            onEachFeature: pop_RT_5,
            style: style_RT_5_0,
        });
        bounds_group.addLayer(layer_RT_5);
        map.addLayer(layer_RT_5);
        function pop_BatasWilayah_6(feature, layer) {
            layer.on({
                mouseout: function(e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                    if (typeof layer.closePopup == 'function') {
                        layer.closePopup();
                    } else {
                        layer.eachLayer(function(feature){
                            feature.closePopup()
                        });
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">Kelas PL</th>\
                        <td>' + (feature.properties['Kelas PL'] !== null ? Autolinker.link(String(feature.properties['Kelas PL'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Shape_Leng</th>\
                        <td>' + (feature.properties['Shape_Leng'] !== null ? Autolinker.link(String(feature.properties['Shape_Leng'])) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_BatasWilayah_6_0(feature) {
            switch(String(feature.properties['Kelas PL'])) {
                case 'Batas Kota':
                    return {
                pane: 'pane_BatasWilayah_6',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '10,5,1,5,1,5',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 7.0,
                fillOpacity: 0,
            }
                    break;
                case 'Batas Kecamatan':
                    return {
                pane: 'pane_BatasWilayah_6',
                opacity: 1,
                color: 'rgba(255,212,128,1.0)',
                dashArray: '',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 6.0,
                fillOpacity: 0,
            }
                    break;
                case 'Batas Kelurahan':
                    return {
                pane: 'pane_BatasWilayah_6',
                opacity: 1,
                color: 'rgba(255,255,0,1.0)',
                dashArray: '',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 6.0,
                fillOpacity: 0,
            }
                    break;
                case 'Batas Lingkungan':
                    return {
                pane: 'pane_BatasWilayah_6',
                opacity: 1,
                color: 'rgba(255,255,0,1.0)',
                dashArray: '',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 4.0,
                fillOpacity: 0,
            }
                    break;
                case 'Batas RW':
                    return {
                pane: 'pane_BatasWilayah_6',
                opacity: 1,
                color: 'rgba(255,255,191,1.0)',
                dashArray: '',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 3.0,
                fillOpacity: 0,
            }
                    break;
                case 'Batas RT':
                    return {
                pane: 'pane_BatasWilayah_6',
                opacity: 1,
                color: 'rgba(255,255,191,1.0)',
                dashArray: '',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 2.0,
                fillOpacity: 0,
            }
                    break;
            }
        }
        map.createPane('pane_BatasWilayah_6');
        map.getPane('pane_BatasWilayah_6').style.zIndex = 406;
        map.getPane('pane_BatasWilayah_6').style['mix-blend-mode'] = 'normal';
        var layer_BatasWilayah_6 = new L.geoJson(json_BatasWilayah_6, {
            attribution: '<a href=""></a>',
            pane: 'pane_BatasWilayah_6',
            onEachFeature: pop_BatasWilayah_6,
            style: style_BatasWilayah_6_0,
        });
        bounds_group.addLayer(layer_BatasWilayah_6);
        map.addLayer(layer_BatasWilayah_6);
        function pop_Toponimi_7(feature, layer) {
            layer.on({
                mouseout: function(e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                    if (typeof layer.closePopup == 'function') {
                        layer.closePopup();
                    } else {
                        layer.eachLayer(function(feature){
                            feature.closePopup()
                        });
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table>\
                    <tr>\
                        <th scope="row">Kelas PL</th>\
                        <td>' + (feature.properties['Kelas PL'] !== null ? Autolinker.link(String(feature.properties['Kelas PL'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Toponimi</th>\
                        <td>' + (feature.properties['Toponimi'] !== null ? Autolinker.link(String(feature.properties['Toponimi'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Jenis</th>\
                        <td>' + (feature.properties['Jenis'] !== null ? Autolinker.link(String(feature.properties['Jenis'])) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_Toponimi_7_0(feature) {
            switch(String(feature.properties['Jenis'])) {
                case 'Industri dan Pergudangan':
                    return {
                pane: 'pane_Toponimi_7',
                radius: 4.0,
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(37,46,211,1.0)',
            }
                    break;
                case 'Instansi dan Perkantoran':
                    return {
                pane: 'pane_Toponimi_7',
                radius: 4.0,
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(141,234,235,1.0)',
            }
                    break;
                case 'Olahraga, Kesenian, dan RTH':
                    return {
                pane: 'pane_Toponimi_7',
                radius: 4.0,
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(112,50,205,1.0)',
            }
                    break;
                case 'Pemakaman':
                    return {
                pane: 'pane_Toponimi_7',
                radius: 4.0,
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(65,235,82,1.0)',
            }
                    break;
                case 'Perdagangan dan Jasa':
                    return {
                pane: 'pane_Toponimi_7',
                radius: 4.0,
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(90,211,20,1.0)',
            }
                    break;
                case 'Pertahanan dan Keamanan':
                    return {
                pane: 'pane_Toponimi_7',
                radius: 4.0,
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(233,131,201,1.0)',
            }
                    break;
                case 'Prasarana Kesehatan':
                    return {
                pane: 'pane_Toponimi_7',
                radius: 4.0,
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(208,75,27,1.0)',
            }
                    break;
                case 'Prasarana Pendidikan':
                    return {
                pane: 'pane_Toponimi_7',
                radius: 4.0,
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(204,223,116,1.0)',
            }
                    break;
                case 'Prasarana Peribadatan':
                    return {
                pane: 'pane_Toponimi_7',
                radius: 4.0,
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(43,210,138,1.0)',
            }
                    break;
                case 'Prasarana Transportasi':
                    return {
                pane: 'pane_Toponimi_7',
                radius: 4.0,
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(193,119,204,1.0)',
            }
                    break;
                case 'Sanitasi':
                    return {
                pane: 'pane_Toponimi_7',
                radius: 4.0,
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(237,132,153,1.0)',
            }
                    break;
                case 'Telekomunikasi':
                    return {
                pane: 'pane_Toponimi_7',
                radius: 4.0,
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(99,168,232,1.0)',
            }
                    break;
            }
        }
        map.createPane('pane_Toponimi_7');
        map.getPane('pane_Toponimi_7').style.zIndex = 407;
        map.getPane('pane_Toponimi_7').style['mix-blend-mode'] = 'normal';
        var layer_Toponimi_7 = new L.geoJson(json_Toponimi_7, {
            attribution: '<a href=""></a>',
            pane: 'pane_Toponimi_7',
            onEachFeature: pop_Toponimi_7,
            pointToLayer: function (feature, latlng) {
                var context = {
                    feature: feature,
                    variables: {}
                };
                return L.circleMarker(latlng, style_Toponimi_7_0(feature));
            },
        });
        bounds_group.addLayer(layer_Toponimi_7);
        map.addLayer(layer_Toponimi_7);
        var baseMaps = {};
        L.control.layers(baseMaps,{'Toponimi<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/Toponimi_7_IndustridanPergudangan0.png" /></td><td>Industri dan Pergudangan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/Toponimi_7_InstansidanPerkantoran1.png" /></td><td>Instansi dan Perkantoran</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/Toponimi_7_OlahragaKeseniandanRTH2.png" /></td><td>Olahraga, Kesenian, dan RTH</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/Toponimi_7_Pemakaman3.png" /></td><td>Pemakaman</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/Toponimi_7_PerdagangandanJasa4.png" /></td><td>Perdagangan dan Jasa</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/Toponimi_7_PertahanandanKeamanan5.png" /></td><td>Pertahanan dan Keamanan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/Toponimi_7_PrasaranaKesehatan6.png" /></td><td>Prasarana Kesehatan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/Toponimi_7_PrasaranaPendidikan7.png" /></td><td>Prasarana Pendidikan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/Toponimi_7_PrasaranaPeribadatan8.png" /></td><td>Prasarana Peribadatan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/Toponimi_7_PrasaranaTransportasi9.png" /></td><td>Prasarana Transportasi</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/Toponimi_7_Sanitasi10.png" /></td><td>Sanitasi</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/Toponimi_7_Telekomunikasi11.png" /></td><td>Telekomunikasi</td></tr></table>': layer_Toponimi_7,'Batas Wilayah<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/BatasWilayah_6_BatasKota0.png" /></td><td>Batas Kota</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/BatasWilayah_6_BatasKecamatan1.png" /></td><td>Batas Kecamatan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/BatasWilayah_6_BatasKelurahan2.png" /></td><td>Batas Kelurahan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/BatasWilayah_6_BatasLingkungan3.png" /></td><td>Batas Lingkungan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/BatasWilayah_6_BatasRW4.png" /></td><td>Batas RW</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/BatasWilayah_6_BatasRT5.png" /></td><td>Batas RT</td></tr></table>': layer_BatasWilayah_6,'RT<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/RT_5_RT010.png" /></td><td>RT 01</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/RT_5_RT021.png" /></td><td>RT 02</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/RT_5_RT032.png" /></td><td>RT 03</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/RT_5_RT043.png" /></td><td>RT 04</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/RT_5_RT054.png" /></td><td>RT 05</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/RT_5_RT065.png" /></td><td>RT 06</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/RT_5_RT076.png" /></td><td>RT 07</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/RT_5_RT087.png" /></td><td>RT 08</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/RT_5_RT098.png" /></td><td>RT 09</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/RT_5_RT109.png" /></td><td>RT 10</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/RT_5_RT1110.png" /></td><td>RT 11</td></tr></table>': layer_RT_5,'RW<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/RW_4_RW010.png" /></td><td>RW 01</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/RW_4_RW021.png" /></td><td>RW 02</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/RW_4_RW032.png" /></td><td>RW 03</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/RW_4_RW043.png" /></td><td>RW 04</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/RW_4_RW054.png" /></td><td>RW 05</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/RW_4_RW065.png" /></td><td>RW 06</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/RW_4_RW076.png" /></td><td>RW 07</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/RW_4_RW087.png" /></td><td>RW 08</td></tr></table>': layer_RW_4,'Lingkungan<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/Lingkungan_3_BANCANG0.png" /></td><td>BANCANG</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/Lingkungan_3_BANJARANYAR1.png" /></td><td>BANJAR ANYAR</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/Lingkungan_3_KARANGLO2.png" /></td><td>KARANGLO</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/Lingkungan_3_PERUMAHANBARAT3.png" /></td><td>PERUMAHAN BARAT</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/Lingkungan_3_PERUMAHANTENGAH4.png" /></td><td>PERUMAHAN TENGAH</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/Lingkungan_3_PERUMAHANTIMUR5.png" /></td><td>PERUMAHAN TIMUR</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/Lingkungan_3_WATES6.png" /></td><td>WATES</td></tr></table>': layer_Lingkungan_3,'Kelurahan<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/Kelurahan_2_KELWATES0.png" /></td><td>KEL. WATES</td></tr></table>': layer_Kelurahan_2,'Tutupan Lahan<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/TutupanLahan_1_Jalan0.png" /></td><td>Jalan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/TutupanLahan_1_Kesehatan1.png" /></td><td>Kesehatan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/TutupanLahan_1_Kolam2.png" /></td><td>Kolam</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/TutupanLahan_1_LahanTerbuka3.png" /></td><td>Lahan Terbuka</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/TutupanLahan_1_Monumen4.png" /></td><td>Monumen</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/TutupanLahan_1_Olahraga5.png" /></td><td>Olahraga</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/TutupanLahan_1_Pariwisata6.png" /></td><td>Pariwisata</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/TutupanLahan_1_Pekarangan7.png" /></td><td>Pekarangan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/TutupanLahan_1_Pemakaman8.png" /></td><td>Pemakaman</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/TutupanLahan_1_Pemukiman9.png" /></td><td>Pemukiman</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/TutupanLahan_1_Pendidikan10.png" /></td><td>Pendidikan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/TutupanLahan_1_Perbankan11.png" /></td><td>Perbankan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/TutupanLahan_1_PerdaganganJasa12.png" /></td><td>Perdagangan & Jasa</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/TutupanLahan_1_Peribadatan13.png" /></td><td>Peribadatan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/TutupanLahan_1_Perkantoran14.png" /></td><td>Perkantoran</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/TutupanLahan_1_Sanitasi15.png" /></td><td>Sanitasi</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/TutupanLahan_1_Sawah16.png" /></td><td>Sawah</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/TutupanLahan_1_Sungai17.png" /></td><td>Sungai</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/TutupanLahan_1_Telekomunikasi18.png" /></td><td>Telekomunikasi</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/TutupanLahan_1_IndustridanPergudangan19.png" /></td><td>Industri dan Pergudangan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/wates/') ?>legend/TutupanLahan_1_SosialBudaya20.png" /></td><td>Sosial Budaya</td></tr></table>': layer_TutupanLahan_1,"Google Satellite": overlay_GoogleSatellite_0,}).addTo(map);
        setBounds();
        var i = 0;
        layer_Kelurahan_2.eachLayer(function(layer) {
            var context = {
                feature: layer.feature,
                variables: {}
            };
            layer.bindTooltip((layer.feature.properties['Kelurahan'] !== null?String('<div style="color: #000000; font-size: 12pt; font-family: \'MS Shell Dlg 2\', sans-serif;">' + layer.feature.properties['Kelurahan']) + '</div>':''), {permanent: true, offset: [-0, -16], className: 'css_Kelurahan_2'});
            labels.push(layer);
            totalMarkers += 1;
              layer.added = true;
              addLabel(layer, i);
              i++;
        });
        var i = 0;
        layer_Lingkungan_3.eachLayer(function(layer) {
            var context = {
                feature: layer.feature,
                variables: {}
            };
            layer.bindTooltip((layer.feature.properties['Lingkungan'] !== null?String('<div style="color: #000000; font-size: 10pt; font-family: \'MS Shell Dlg 2\', sans-serif;">' + layer.feature.properties['Lingkungan']) + '</div>':''), {permanent: true, offset: [-0, -16], className: 'css_Lingkungan_3'});
            labels.push(layer);
            totalMarkers += 1;
              layer.added = true;
              addLabel(layer, i);
              i++;
        });
        var i = 0;
        layer_RW_4.eachLayer(function(layer) {
            var context = {
                feature: layer.feature,
                variables: {}
            };
            layer.bindTooltip((layer.feature.properties['RW'] !== null?String('<div style="color: #000000; font-size: 9pt; font-family: \'MS Shell Dlg 2\', sans-serif;">' + layer.feature.properties['RW']) + '</div>':''), {permanent: true, offset: [-0, -16], className: 'css_RW_4'});
            labels.push(layer);
            totalMarkers += 1;
              layer.added = true;
              addLabel(layer, i);
              i++;
        });
        var i = 0;
        layer_RT_5.eachLayer(function(layer) {
            var context = {
                feature: layer.feature,
                variables: {}
            };
            layer.bindTooltip((layer.feature.properties['RT'] !== null?String('<div style="color: #000000; font-size: 8pt; font-family: \'MS Shell Dlg 2\', sans-serif;">' + layer.feature.properties['RT']) + '</div>':''), {permanent: true, offset: [-0, -16], className: 'css_RT_5'});
            labels.push(layer);
            totalMarkers += 1;
              layer.added = true;
              addLabel(layer, i);
              i++;
        });
        map.addControl(new L.Control.Search({
            layer: layer_Toponimi_7,
            initial: false,
            hideMarkerOnCollapse: true,
            propertyName: 'Toponimi'}));
        resetLabels([layer_Kelurahan_2,layer_Lingkungan_3,layer_RW_4,layer_RT_5]);
        map.on("zoomend", function(){
            resetLabels([layer_Kelurahan_2,layer_Lingkungan_3,layer_RW_4,layer_RT_5]);
        });
        map.on("layeradd", function(){
            resetLabels([layer_Kelurahan_2,layer_Lingkungan_3,layer_RW_4,layer_RT_5]);
        });
        map.on("layerremove", function(){
            resetLabels([layer_Kelurahan_2,layer_Lingkungan_3,layer_RW_4,layer_RT_5]);
        });
        </script>
    </body>
</html>
