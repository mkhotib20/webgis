<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link rel="stylesheet" href="<?php echo base_url('assets/balong/') ?>css/leaflet.css"><link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css"><link rel="stylesheet" href="<?php echo base_url('assets/balong/') ?>css/L.Control.Locate.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/balong/') ?>css/qgis2web.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/balong/') ?>css/leaflet-search.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/balong/') ?>css/leaflet-measure.css">
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
                <h2>Peta Potensi Kelurahan Balongsari</h2>
                <p><a href="<?php echo base_url('profile-kelurahan/balongsari') ?>">Profil Kelurahan <span class="fas fa-angle-double-right"></span></a></p>
            </center>
        </div>
        <div class="col-md-12">
            <div style="height: 550px;" id="map"></div>
        </div>
    </div>
</section>
        <script src="<?php echo base_url('assets/balong/') ?>js/qgis2web_expressions.js"></script>
        <script src="<?php echo base_url('assets/balong/') ?>js/leaflet.js"></script><script src="<?php echo base_url('assets/balong/') ?>js/L.Control.Locate.min.js"></script>
        <script src="<?php echo base_url('assets/balong/') ?>js/multi-style-layer.js"></script>
        <script src="<?php echo base_url('assets/balong/') ?>js/leaflet.rotatedMarker.js"></script>
        <script src="<?php echo base_url('assets/balong/') ?>js/leaflet.pattern.js"></script>
        <script src="<?php echo base_url('assets/balong/') ?>js/leaflet-hash.js"></script>
        <script src="<?php echo base_url('assets/balong/') ?>js/Autolinker.min.js"></script>
        <script src="<?php echo base_url('assets/balong/') ?>js/rbush.min.js"></script>
        <script src="<?php echo base_url('assets/balong/') ?>js/labelgun.min.js"></script>
        <script src="<?php echo base_url('assets/balong/') ?>js/labels.js"></script>
        <script src="<?php echo base_url('assets/balong/') ?>js/leaflet-measure.js"></script>
        <script src="<?php echo base_url('assets/balong/') ?>js/leaflet-search.js"></script>
        <script src="<?php echo base_url('assets/balong/') ?>data/TutupanLahan_1.js"></script>
        <script src="<?php echo base_url('assets/balong/') ?>data/Kelurahan_2.js"></script>
        <script src="<?php echo base_url('assets/balong/') ?>data/Lingkungan_3.js"></script>
        <script src="<?php echo base_url('assets/balong/') ?>data/RW_4.js"></script>
        <script src="<?php echo base_url('assets/balong/') ?>data/RT_5.js"></script>
        <script src="<?php echo base_url('assets/balong/') ?>data/BatasRT_6.js"></script>
        <script src="<?php echo base_url('assets/balong/') ?>data/BatasRW_7.js"></script>
        <script src="<?php echo base_url('assets/balong/') ?>data/BatasLingkungan_8.js"></script>
        <script src="<?php echo base_url('assets/balong/') ?>data/BatasKelurahan_9.js"></script>
        <script src="<?php echo base_url('assets/balong/') ?>data/Toponimi_10.js"></script>
        <script>
        var m2px = 1;
        function newM2px() {
            var centerLatLng = map.getCenter();
            var pointC = map.latLngToContainerPoint(centerLatLng);
            var pointX = [pointC.x + 100, pointC.y];

            var latLngC = map.containerPointToLatLng(pointC);
            var latLngX = map.containerPointToLatLng(pointX);

            var distanceX = latLngC.distanceTo(latLngX)/100;

            reciprocal = 1 / distanceX;
            m2px = reciprocal;
        }
        function geoStyle(m) {
            return Math.ceil(m * m2px);
        }
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
        }).fitBounds([[-7.48298641612,112.431110322],[-7.46071481694,112.471592106]]);
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
        var basemap0 = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors,<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
            maxZoom: 28
        });
        basemap0.addTo(map);
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
                        <th scope="row">Toponimi</th>\
                        <td>' + (feature.properties['Toponimi'] !== null ? Autolinker.link(String(feature.properties['Toponimi'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Kelas PL</th>\
                        <td>' + (feature.properties['Kelas PL'] !== null ? Autolinker.link(String(feature.properties['Kelas PL'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Jenis</th>\
                        <td>' + (feature.properties['Jenis'] !== null ? Autolinker.link(String(feature.properties['Jenis'])) : '') + '</td>\
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
                        <th scope="row">Kota</th>\
                        <td>' + (feature.properties['Kota'] !== null ? Autolinker.link(String(feature.properties['Kota'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Kecamatan</th>\
                        <td>' + (feature.properties['Kecamatan'] !== null ? Autolinker.link(String(feature.properties['Kecamatan'])) : '') + '</td>\
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
                case 'Kel. Balongsari':
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
                fillColor: 'rgba(114,190,123,0.15)',
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
                        <th scope="row">Kelurahan</th>\
                        <td>' + (feature.properties['Kelurahan'] !== null ? Autolinker.link(String(feature.properties['Kelurahan'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Kota</th>\
                        <td>' + (feature.properties['Kota'] !== null ? Autolinker.link(String(feature.properties['Kota'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Kecamatan</th>\
                        <td>' + (feature.properties['Kecamatan'] !== null ? Autolinker.link(String(feature.properties['Kecamatan'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Lingkungan</th>\
                        <td>' + (feature.properties['Lingkungan'] !== null ? Autolinker.link(String(feature.properties['Lingkungan'])) : '') + '</td>\
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
                case 'Balongcok':
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
                fillColor: 'rgba(208,28,139,0.6)',
            }
                    break;
                case 'Gembongsari':
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
                fillColor: 'rgba(243,204,228,0.6)',
            }
                    break;
                case 'Mangunrejo':
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
                fillColor: 'rgba(205,233,172,0.6)',
            }
                    break;
                case 'Sumolepen':
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
                fillColor: 'rgba(77,172,38,0.6)',
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
                        <th scope="row">Kota</th>\
                        <td>' + (feature.properties['Kota'] !== null ? Autolinker.link(String(feature.properties['Kota'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Kecamatan</th>\
                        <td>' + (feature.properties['Kecamatan'] !== null ? Autolinker.link(String(feature.properties['Kecamatan'])) : '') + '</td>\
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
                color: 'rgba(0,0,0,0.4)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(166,97,26,0.4)',
            }
                    break;
                case 'RW 02':
                    return {
                pane: 'pane_RW_4',
                opacity: 1,
                color: 'rgba(0,0,0,0.4)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(231,211,165,0.4)',
            }
                    break;
                case 'RW 03':
                    return {
                pane: 'pane_RW_4',
                opacity: 1,
                color: 'rgba(0,0,0,0.4)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(167,219,211,0.4)',
            }
                    break;
                case 'RW 04':
                    return {
                pane: 'pane_RW_4',
                opacity: 1,
                color: 'rgba(0,0,0,0.4)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(1,133,113,0.4)',
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
                        <th scope="row">Kota</th>\
                        <td>' + (feature.properties['Kota'] !== null ? Autolinker.link(String(feature.properties['Kota'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Kecamatan</th>\
                        <td>' + (feature.properties['Kecamatan'] !== null ? Autolinker.link(String(feature.properties['Kecamatan'])) : '') + '</td>\
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
                color: 'rgba(0,0,0,0.2)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(13,8,135,0.2)',
            }
                    break;
                case 'RT 02':
                    return {
                pane: 'pane_RT_5',
                opacity: 1,
                color: 'rgba(0,0,0,0.2)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(156,23,158,0.2)',
            }
                    break;
                case 'RT 03':
                    return {
                pane: 'pane_RT_5',
                opacity: 1,
                color: 'rgba(0,0,0,0.2)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(237,121,83,0.2)',
            }
                    break;
                case 'RT 04':
                    return {
                pane: 'pane_RT_5',
                opacity: 1,
                color: 'rgba(0,0,0,0.2)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(240,249,33,0.2)',
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
        function pop_BatasRT_6(feature, layer) {
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
                        <td colspan="2"><strong>Batas Wilayah</strong><br />' + (feature.properties['Batas Wilayah'] !== null ? Autolinker.link(String(feature.properties['Batas Wilayah'])) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_BatasRT_6_0(feature) {
            switch(String(feature.properties['Batas Wilayah'])) {
                case 'Batas RT':
                    return {
                pane: 'pane_BatasRT_6',
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
        function style_BatasRT_6_1(feature) {
            switch(String(feature.properties['Batas Wilayah'])) {
                case 'Batas RT':
                    return {
                pane: 'pane_BatasRT_6',
                opacity: 1,
                color: 'rgba(127,127,127,1.0)',
                dashArray: '10,5',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 1.0,
                fillOpacity: 0,
            }
                    break;
            }
        }
        map.createPane('pane_BatasRT_6');
        map.getPane('pane_BatasRT_6').style.zIndex = 406;
        map.getPane('pane_BatasRT_6').style['mix-blend-mode'] = 'normal';
        var layer_BatasRT_6 = new L.geoJson.multiStyle(json_BatasRT_6, {
            attribution: '<a href=""></a>',
            pane: 'pane_BatasRT_6',
            onEachFeature: pop_BatasRT_6,
            styles: [style_BatasRT_6_0,style_BatasRT_6_1,]
        });
        bounds_group.addLayer(layer_BatasRT_6);
        map.addLayer(layer_BatasRT_6);
        function pop_BatasRW_7(feature, layer) {
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
                        <td colspan="2"><strong>Batas Wilayah</strong><br />' + (feature.properties['Batas Wilayah'] !== null ? Autolinker.link(String(feature.properties['Batas Wilayah'])) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_BatasRW_7_0(feature) {
            switch(String(feature.properties['Batas Wilayah'])) {
                case 'Batas RW':
                    return {
                pane: 'pane_BatasRW_7',
                opacity: 1,
                color: 'rgba(255,255,191,1.0)',
                dashArray: '',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 3.0,
                fillOpacity: 0,
            }
                    break;
            }
        }
        function style_BatasRW_7_1(feature) {
            switch(String(feature.properties['Batas Wilayah'])) {
                case 'Batas RW':
                    return {
                pane: 'pane_BatasRW_7',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '10,5',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 1.0,
                fillOpacity: 0,
            }
                    break;
            }
        }
        map.createPane('pane_BatasRW_7');
        map.getPane('pane_BatasRW_7').style.zIndex = 407;
        map.getPane('pane_BatasRW_7').style['mix-blend-mode'] = 'normal';
        var layer_BatasRW_7 = new L.geoJson.multiStyle(json_BatasRW_7, {
            attribution: '<a href=""></a>',
            pane: 'pane_BatasRW_7',
            onEachFeature: pop_BatasRW_7,
            styles: [style_BatasRW_7_0,style_BatasRW_7_1,]
        });
        bounds_group.addLayer(layer_BatasRW_7);
        map.addLayer(layer_BatasRW_7);
        function pop_BatasLingkungan_8(feature, layer) {
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
                        <td colspan="2"><strong>Batas Wilayah</strong><br />' + (feature.properties['Batas Wilayah'] !== null ? Autolinker.link(String(feature.properties['Batas Wilayah'])) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_BatasLingkungan_8_0(feature) {
            switch(String(feature.properties['Batas Wilayah'])) {
                case 'Batas Lingkungan':
                    return {
                pane: 'pane_BatasLingkungan_8',
                opacity: 1,
                color: 'rgba(255,255,0,1.0)',
                dashArray: '',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 4.0,
                fillOpacity: 0,
            }
                    break;
            }
        }
        function style_BatasLingkungan_8_1(feature) {
            switch(String(feature.properties['Batas Wilayah'])) {
                case 'Batas Lingkungan':
                    return {
                pane: 'pane_BatasLingkungan_8',
                opacity: 1,
                color: 'rgba(178,178,178,1.0)',
                dashArray: '10,5',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 1.0,
                fillOpacity: 0,
            }
                    break;
            }
        }
        function style_BatasLingkungan_8_2(feature) {
            switch(String(feature.properties['Batas Wilayah'])) {
                case 'Batas Lingkungan':
                    return {
                pane: 'pane_BatasLingkungan_8',
                opacity: 1,
                color: 'rgba(178,178,178,1.0)',
                dashArray: '10,5',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 1.0,
                fillOpacity: 0,
            }
                    break;
            }
        }
        map.createPane('pane_BatasLingkungan_8');
        map.getPane('pane_BatasLingkungan_8').style.zIndex = 408;
        map.getPane('pane_BatasLingkungan_8').style['mix-blend-mode'] = 'normal';
        var layer_BatasLingkungan_8 = new L.geoJson.multiStyle(json_BatasLingkungan_8, {
            attribution: '<a href=""></a>',
            pane: 'pane_BatasLingkungan_8',
            onEachFeature: pop_BatasLingkungan_8,
            styles: [style_BatasLingkungan_8_0,style_BatasLingkungan_8_1,style_BatasLingkungan_8_2,]
        });
        bounds_group.addLayer(layer_BatasLingkungan_8);
        map.addLayer(layer_BatasLingkungan_8);
        function pop_BatasKelurahan_9(feature, layer) {
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
                        <td colspan="2"><strong>Batas Wilayah</strong><br />' + (feature.properties['Batas Wilayah'] !== null ? Autolinker.link(String(feature.properties['Batas Wilayah'])) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_BatasKelurahan_9_0(feature) {
            switch(String(feature.properties['Batas Wilayah'])) {
                case 'Batas Kelurahan':
                    return {
                pane: 'pane_BatasKelurahan_9',
                opacity: 1,
                color: 'rgba(255,255,0,1.0)',
                dashArray: '',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 6.0,
                fillOpacity: 0,
            }
                    break;
            }
        }
        function style_BatasKelurahan_9_1(feature) {
            switch(String(feature.properties['Batas Wilayah'])) {
                case 'Batas Kelurahan':
                    return {
                pane: 'pane_BatasKelurahan_9',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '10,5',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 1.0,
                fillOpacity: 0,
            }
                    break;
            }
        }
        function style_BatasKelurahan_9_2(feature) {
            switch(String(feature.properties['Batas Wilayah'])) {
                case 'Batas Kelurahan':
                    return {
                pane: 'pane_BatasKelurahan_9',
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '10,5',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: geoStyle(1.0),
                fillOpacity: 0,
            }
                    break;
            }
        }
        map.createPane('pane_BatasKelurahan_9');
        map.getPane('pane_BatasKelurahan_9').style.zIndex = 409;
        map.getPane('pane_BatasKelurahan_9').style['mix-blend-mode'] = 'normal';
        var layer_BatasKelurahan_9 = new L.geoJson.multiStyle(json_BatasKelurahan_9, {
            attribution: '<a href=""></a>',
            pane: 'pane_BatasKelurahan_9',
            onEachFeature: pop_BatasKelurahan_9,
            styles: [style_BatasKelurahan_9_0,style_BatasKelurahan_9_1,style_BatasKelurahan_9_2,]
        });
        bounds_group.addLayer(layer_BatasKelurahan_9);
        map.addLayer(layer_BatasKelurahan_9);
        function pop_Toponimi_10(feature, layer) {
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
                        <th scope="row">Jenis</th>\
                        <td>' + (feature.properties['Jenis'] !== null ? Autolinker.link(String(feature.properties['Jenis'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Toponimi</th>\
                        <td>' + (feature.properties['Toponimi'] !== null ? Autolinker.link(String(feature.properties['Toponimi'])) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Alamat</th>\
                        <td>' + (feature.properties['Alamat'] !== null ? Autolinker.link(String(feature.properties['Alamat'])) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_Toponimi_10_0(feature) {
            switch(String(feature.properties['Jenis'])) {
                case 'Gedung':
                    return {
                pane: 'pane_Toponimi_10',
                radius: 4.0,
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(112,89,225,1.0)',
            }
                    break;
                case 'Kesehatan':
                    return {
                pane: 'pane_Toponimi_10',
                radius: 4.0,
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(212,159,45,1.0)',
            }
                    break;
                case 'Monumen':
                    return {
                pane: 'pane_Toponimi_10',
                radius: 4.0,
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(177,205,54,1.0)',
            }
                    break;
                case 'Pariwisata':
                    return {
                pane: 'pane_Toponimi_10',
                radius: 4.0,
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(212,64,30,1.0)',
            }
                    break;
                case 'Pemerintahan':
                    return {
                pane: 'pane_Toponimi_10',
                radius: 4.0,
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(168,99,200,1.0)',
            }
                    break;
                case 'Pendidikan':
                    return {
                pane: 'pane_Toponimi_10',
                radius: 4.0,
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(62,201,157,1.0)',
            }
                    break;
                case 'Perbankan':
                    return {
                pane: 'pane_Toponimi_10',
                radius: 4.0,
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(27,89,213,1.0)',
            }
                    break;
                case 'Perdagangan & Jasa':
                    return {
                pane: 'pane_Toponimi_10',
                radius: 4.0,
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(81,182,204,1.0)',
            }
                    break;
                case 'Peribadatan':
                    return {
                pane: 'pane_Toponimi_10',
                radius: 4.0,
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(118,209,75,1.0)',
            }
                    break;
                case 'Ruang Terbuka Hijau':
                    return {
                pane: 'pane_Toponimi_10',
                radius: 4.0,
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(212,44,181,1.0)',
            }
                    break;
                case 'Telekomunikasi':
                    return {
                pane: 'pane_Toponimi_10',
                radius: 4.0,
                opacity: 1,
                color: 'rgba(0,0,0,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(45,227,79,1.0)',
            }
                    break;
            }
        }
        map.createPane('pane_Toponimi_10');
        map.getPane('pane_Toponimi_10').style.zIndex = 410;
        map.getPane('pane_Toponimi_10').style['mix-blend-mode'] = 'normal';
        var layer_Toponimi_10 = new L.geoJson(json_Toponimi_10, {
            attribution: '<a href=""></a>',
            pane: 'pane_Toponimi_10',
            onEachFeature: pop_Toponimi_10,
            pointToLayer: function (feature, latlng) {
                var context = {
                    feature: feature,
                    variables: {}
                };
                return L.circleMarker(latlng, style_Toponimi_10_0(feature));
            },
        });
        bounds_group.addLayer(layer_Toponimi_10);
        map.addLayer(layer_Toponimi_10);
        var baseMaps = {};
        L.control.layers(baseMaps,{'Toponimi<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/Toponimi_10_Gedung0.png" /></td><td>Gedung</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/Toponimi_10_Kesehatan1.png" /></td><td>Kesehatan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/Toponimi_10_Monumen2.png" /></td><td>Monumen</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/Toponimi_10_Pariwisata3.png" /></td><td>Pariwisata</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/Toponimi_10_Pemerintahan4.png" /></td><td>Pemerintahan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/Toponimi_10_Pendidikan5.png" /></td><td>Pendidikan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/Toponimi_10_Perbankan6.png" /></td><td>Perbankan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/Toponimi_10_PerdaganganJasa7.png" /></td><td>Perdagangan & Jasa</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/Toponimi_10_Peribadatan8.png" /></td><td>Peribadatan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/Toponimi_10_RuangTerbukaHijau9.png" /></td><td>Ruang Terbuka Hijau</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/Toponimi_10_Telekomunikasi10.png" /></td><td>Telekomunikasi</td></tr></table>': layer_Toponimi_10,'Batas Kelurahan<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/BatasKelurahan_9_BatasKelurahan0.png" /></td><td>Batas Kelurahan</td></tr></table>': layer_BatasKelurahan_9,'Batas Lingkungan<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/BatasLingkungan_8_BatasLingkungan0.png" /></td><td>Batas Lingkungan</td></tr></table>': layer_BatasLingkungan_8,'Batas RW<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/BatasRW_7_BatasRW0.png" /></td><td>Batas RW</td></tr></table>': layer_BatasRW_7,'Batas RT<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/BatasRT_6_BatasRT0.png" /></td><td>Batas RT</td></tr></table>': layer_BatasRT_6,'RT<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/RT_5_RT010.png" /></td><td>RT 01</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/RT_5_RT021.png" /></td><td>RT 02</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/RT_5_RT032.png" /></td><td>RT 03</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/RT_5_RT043.png" /></td><td>RT 04</td></tr></table>': layer_RT_5,'RW<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/RW_4_RW010.png" /></td><td>RW 01</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/RW_4_RW021.png" /></td><td>RW 02</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/RW_4_RW032.png" /></td><td>RW 03</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/RW_4_RW043.png" /></td><td>RW 04</td></tr></table>': layer_RW_4,'Lingkungan<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/Lingkungan_3_Balongcok0.png" /></td><td>Balongcok</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/Lingkungan_3_Gembongsari1.png" /></td><td>Gembongsari</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/Lingkungan_3_Mangunrejo2.png" /></td><td>Mangunrejo</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/Lingkungan_3_Sumolepen3.png" /></td><td>Sumolepen</td></tr></table>': layer_Lingkungan_3,'Kelurahan<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/Kelurahan_2_KelBalongsari0.png" /></td><td>Kel. Balongsari</td></tr></table>': layer_Kelurahan_2,'Tutupan Lahan<br /><table><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/TutupanLahan_1_Jalan0.png" /></td><td>Jalan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/TutupanLahan_1_Kesehatan1.png" /></td><td>Kesehatan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/TutupanLahan_1_Kolam2.png" /></td><td>Kolam</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/TutupanLahan_1_LahanTerbuka3.png" /></td><td>Lahan Terbuka</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/TutupanLahan_1_Monumen4.png" /></td><td>Monumen</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/TutupanLahan_1_Olahraga5.png" /></td><td>Olahraga</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/TutupanLahan_1_Pariwisata6.png" /></td><td>Pariwisata</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/TutupanLahan_1_Pekarangan7.png" /></td><td>Pekarangan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/TutupanLahan_1_Pemakaman8.png" /></td><td>Pemakaman</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/TutupanLahan_1_Pemukiman9.png" /></td><td>Pemukiman</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/TutupanLahan_1_Pendidikan10.png" /></td><td>Pendidikan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/TutupanLahan_1_Perbankan11.png" /></td><td>Perbankan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/TutupanLahan_1_PerdaganganJasa12.png" /></td><td>Perdagangan & Jasa</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/TutupanLahan_1_Peribadatan13.png" /></td><td>Peribadatan</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/TutupanLahan_1_Perkantoran14.png" /></td><td>Perkantoran</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/TutupanLahan_1_Sanitasi15.png" /></td><td>Sanitasi</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/TutupanLahan_1_Sawah16.png" /></td><td>Sawah</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/TutupanLahan_1_Sungai17.png" /></td><td>Sungai</td></tr><tr><td style="text-align: center;"><img src="<?php echo base_url('assets/balong/') ?>legend/TutupanLahan_1_Telekomunikasi18.png" /></td><td>Telekomunikasi</td></tr></table>': layer_TutupanLahan_1,"Google Satellite": overlay_GoogleSatellite_0,}).addTo(map);
        setBounds();
        var i = 0;
        layer_Kelurahan_2.eachLayer(function(layer) {
            var context = {
                feature: layer.feature,
                variables: {}
            };
            layer.bindTooltip((layer.feature.properties['Kelurahan'] !== null?String('<div style="color: #000000; font-size: 14pt; font-family: \'MS Shell Dlg 2\', sans-serif;">' + layer.feature.properties['Kelurahan']) + '</div>':''), {permanent: true, offset: [-0, -16], className: 'css_Kelurahan_2'});
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
        newM2px();

            layer_BatasKelurahan_9.setStyle(style_BatasKelurahan_9_0);
        map.on("zoomend", function(){
            newM2px();

            layer_BatasKelurahan_9.setStyle(style_BatasKelurahan_9_0);
        });
        map.addControl(new L.Control.Search({
            layer: layer_Toponimi_10,
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
