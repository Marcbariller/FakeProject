function initMap() {
    var rennes = {lat: 48.116, lng: -1.6805983};
              
        var maCarte = new google.maps.Map(document.getElementById('map'), {
             zoom: 13,
             center: rennes
         });
           
           var locations = [

             {lat: 48.109684, lng: -1.6814463},      // République
             {lat: 48.1213462, lng: -1.7064364},     // Villejean
             {lat: 48.1142272, lng: -1.6810257},     // St Anne
             {lat: 48.1047213, lng: -1.6817933},     // Colombier
             {lat: 48.122426, lng: -1.6396949},     // Beaulieu   
           ]
         var markers = locations.map(function(locations, i) {
           return new google.maps.Marker({
             position: locations,
             map : maCarte,
             animation: google.maps.Animation.DROP,
           });
         });
//					   var republique = new google.maps.Marker({
//                            map : maCarte,
//                            animation: google.maps.Animation.DROP,
//                            title : "Lundi & Samedi",
//                            position: {lat: 48.109853, lng: -1.679198}, 
//                        });
//
//					   var villejean = new google.maps.Marker({
//                            map : maCarte,
//                            animation: google.maps.Animation.DROP,
//                            title: "Mardi",
//                            position: {lat: 48.121105, lng: -1.7042428}, 
//                        });
//                        var stanne = new google.maps.Marker({
//                            map : maCarte,
//                            animation: google.maps.Animation.DROP,
//                            title: "Mercredi",
//                            position: {lat: 48.1146086, lng: -1.6804669}, 
//                        });
//                        var colombier = new google.maps.Marker({
//                            map : maCarte,
//                            animation: google.maps.Animation.DROP,
//                            title: "Jeudi",
//                            position: {lat: 48.1043929, lng: -1.6800711}, 
//                        });
//                        var beaulieu = new google.maps.Marker({
//                            map : maCarte,
//                            animation: google.maps.Animation.DROP,
//                            title: "Vendredi",
//                            position: {lat: 48.1262428, lng: -1.6519089}, 
//                        });
            }

//             jQuery(document).ready(function(){
//                 console.log("jQuery est prêt !");
//                 
//                 $("div#lundi").hover(function(){
//                     console.log("lundi");
//                 });
//             });
