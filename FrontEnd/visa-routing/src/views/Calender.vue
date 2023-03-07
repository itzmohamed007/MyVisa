<template>
  <div class="calender container p-5">
    <FullCalendar :options='calendarOptions' />
  </div>
</template>

<script>
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'

export default {
  components: {FullCalendar},
  data: function() {
    return {
      calendarOptions: {
        plugins: [dayGridPlugin, interactionPlugin],
        selectable: true    ,
        dateClick: function(info) {
            alert('clicked ' + info.dateStr);
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
  }
}
</script>