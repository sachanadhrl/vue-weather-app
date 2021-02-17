<template>
    <div class="w-2/6 text-white mb-8">
        <div class="places-input text-gray-800">
            <input type="text" class="w-full">
        </div>
        <div class="weather-container font-sans w-full max-w-lg rounded-lg overflow-hidden bg-gray-900 shadow-lg mt-4">
            <div class="current-weather flex items-center justify-between px-6 py-8">
                <div class="flex items-center">
                    <div>
                        <div class="text-6xl font-semibold">{{ currenTemperature.actual }}°C</div>
                        <div>Feels like {{ currenTemperature.feels }}°C</div>
                    </div>
                    <div class="mx-5">
                        <div class="font-semibold">Cloudy</div>
                        <div>{{ location.name }}</div>
                    </div>
                </div>
                <div>icon</div>
            </div> <!-- end current weather -->

            <div class="future-weather text-sm bg-gray-800 px-6 py-8 overflow-hidden">
                <div v-for="(day, index) in daily"
                    :key="day.time"
                    class="flex items-center"
                    :class="{ 'mt-8' : index > 0 }">
                    <div class="w-1/6 text-lg text-gray-200">MON</div>
                    <div class="w-4/6 px-4 flex items-center">
                        <div>icon</div>
                        <div class="ml-3">Cloudy with a chance of showers</div>
                    </div>
                    <div class="w-1/6 text-right">
                        <div>5°C</div>
                        <div>-2°C</div>
                    </div>
                </div>
            </div> <!-- end future weather -->
        </div> <!-- end weather container -->
    </div>
</template>

<script>
    export default {
        mounted() {
            this.fetchData()
        },
        data() {
            return {
                currenTemperature: {
                    actual: '',
                    feels: '',
                    summary: '',
                    icon: '',
                },
                daily: [],
                location: {
                    name: '',
                    lat: -6.2146,
                    lon: 106.8451,
                }
            }  
        },
        methods: {
            fetchData() {
                fetch(`/api/weather?lat=${this.location.lat}&lon=${this.location.lon}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    this.currenTemperature.actual = Math.round(data.current.temp)
                    this.currenTemperature.feels = Math.round(data.current.feels_like)
                    this.currenTemperature.summary = data.current.weather[0].description
                    this.currenTemperature.icon = data.current.weather[0].icon
                    console.log(this.currenTemperature.icon)
                    this.location.name = data.timezone

                    this.daily = data.daily
                })
            }
        }
    }
</script>
