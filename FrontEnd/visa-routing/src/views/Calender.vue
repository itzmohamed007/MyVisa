<template>
  <div class="container p-5 mt-5">
    <div>
      <h1 class="mb-5">Reservation Form:</h1>
        <div class="d-flex flex-column bg-light rouned p-5 g-4">
          <div class="calender w-100 p-5 border rounded-3">
            <FullCalendar :options='calendarOptions' />
          </div>
          <div class="w-100 p-5 d-flex flex-column align-items-center">
            <h2 class="mb-5">Choose A Timing:</h2>
            <div class="form-floating mb-3 w-50" >
              <select class="form-select form-control" aria-label="Default select" v-model="time">
                <option>08:30-10:00</option>
                <option>10:30-12:30</option>
                <option>02:30-04:00</option>
                <option>04:30-06:30</option>
              </select>
              <label>type de chambre</label>
            </div>
          </div>
        </div>
        <div>
          <button class="check btn py-2 px-5 rounded-3 fs-4 mx-3" @click="check()">Check</button>
        </div>
    </div>
  </div>
</template>

<script>
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'
import axios from 'axios'
import router from '@/router'

export default {
  data() {
    return {
      time: "",
      calendarOptions: {
        plugins: [dayGridPlugin, interactionPlugin],
        selectable: true    ,
        dateClick: function(info) {
          localStorage.setItem('date', info.dateStr)
        },
        validRange: function(currentDate) {
            var startDate = new Date(currentDate.valueOf())
            var endDate = new Date(currentDate.valueOf())

            endDate.setMonth(endDate.getMonth() + 3)

            return {
              start: startDate,
              end: endDate
            }
        },
        initialView: 'dayGridMonth',
        weekends: false,
        events: false
      }
    }
  },
  components: {FullCalendar},
  methods: {
    async check() {
      let date = localStorage.getItem('date')
      let response = await axios.get('http://localhost/MyVisa/myapi/api/reservation_filter.php?date=' + date + '&time=' + this.time)
      if(response.data.message == "Reservation Available") {
        let id = localStorage.getItem('id')
        let temp = await axios.post('http://localhost/MyVisa/myapi/api/reservation.php', {
          'id_client': id,
          'reservation_date': date,
          'reservation_time': this.time
        })
        console.log(temp)
        router.push('/')
      } else if(response.data.message == 'Missing Required Fields') {
        alert(response.data.message)
        return
      } else if(response.data.errors != undefined) {
        alert(response.data.errors.join('\n'))
        return
      }
      else {
        alert('Reservation Unavailable')
      }
    }
  }
}
</script>

<style>
.check {
  margin-top: 20px;
  padding: .4REM 2rem;
  background-color: rgb(66, 66, 66);
  transition: .5s ease-in-out;
  color: #fff;
}
.check:hover {
  background-color: rgb(0, 0, 0);
  color: white;
}
.calender {
  color: #000000;
  background-color: white;
  font-family: 'Roboto', sans-serif;
}
.calender a {
  text-decoration: none !important;
  color: black !important;
  align-self: center;
  justify-self: center;
}
</style>