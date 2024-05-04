<script setup>
import { Loader } from "@googlemaps/js-api-loader"

const address = ref('')
const url = 'https://valencia.opendatasoft.com/api/explore/v2.1/catalog/datasets/vias/records?select=codtipovia%2Cnomoficial&where=nomoficial%20like%20%22tamarindes%22%20or%20nomcortotraduc%20like%20%22tamarindes%22%20or%20traducnooficial%20like%20%22tamarindes%22&limit=20'

onMounted(async () => {
  const loader = new Loader({
    apiKey: 'AIzaSyBLyFODaMeSZ5PuSkv2y0q3y_XFbSsgC1M',
    version: "weekly",
  })

  const Places = await loader.importLibrary('places')

  // the center, defaultbounds are not necessary but are best practices to limit/focus search results
  const center = { lat: 34.082298, lng: -82.284777 }; 
  // Create a bounding box with sides ~10km away from the center point
  const defaultBounds = {
      north: center.lat + 0.1,
      south: center.lat - 0.1,
      east: center.lng + 0.1,
      west: center.lng - 0.1,
  };

 //this const will be the first arg for the new instance of the Places API

 const input = document.getElementById("place"); //binds to our input element
  

 //this object will be our second arg for the new instance of the Places API
 const options = {
   bounds: defaultBounds, //optional
   types: ["establishment"], //optioanl
   componentRestrictions: { country: "es" }, //limiter for the places api search
   fields: ["address_components", "geometry", "icon", "name"], //allows the api to accept these inputs and return similar ones
   strictBounds: false, //optional
  };

  // per the Google docs create the new instance of the import above. I named it Places.
  const autocomplete = new Places.Autocomplete(input, options);

  console.log('autocomplete', autocomplete); //optional log but will show you the available methods and properties of the new instance of Places.

  //add the place_changed listener to display results when inputs change
  autocomplete.addListener('place_changed', () => {
      const place = autocomplete.getPlace(); //this callback is inherent you will see it if you logged autocomplete
      console.log('place', place);
  });
})
</script>

<template>
  <div>
    <input id="place" type="text" placeholder="Enter a location" />
    <input type="text" v-model="address" />
  </div>
</template>