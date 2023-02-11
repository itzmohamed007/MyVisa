<template>
  <div class="px-4 px-lg-5">
    <div class="form-wrapper gx-4 gx-lg-5 mb-5 bg-light rounded-4 p-5">
      <form class="container px-5" @submit.prevent="submitHandle">
        <div class="row justify-content-between">
          <div class="col-lg-6 col-md-12">
            <div class="form-floating mb-3">
              <input class="form-control" type="text" v-model="data.fullName" />
              <label>Full Name:</label>
            </div>
            <div class="form-floating mb-3">
              <input class="form-control" type="date" v-model="data.birth" />
              <label>Birth Date:</label>
            </div>
            <div class="form-floating mb-3">
              <input
                class="form-control"
                type="text"
                v-model="data.nationality"
              />
              <label>Nationality:</label>
            </div>
            <div class="form-floating mb-3">
              <select
                class="cpt-4 form-select form-control"
                aria-label="Default select"
                v-model="data.situation"
              >
                <option>Single</option>
                <option>Married</option>
                <option>Widow</option>
              </select>
              <label>Familial Situation:</label>
            </div>
            <div class="form-floating mb-3">
              <input class="form-control" type="email" v-model="data.email" />
              <label>Email:</label>
            </div>
          </div>
          <div class="col-lg-6 col-md-12">
            <div class="form-floating mb-3">
              <select
                class="cpt-4 form-select form-control"
                aria-label="Default select"
                v-model="data.visaType"
              >
                <option value="long">Long Stay Visa</option>
                <option vualu="hamza">Long Short Visa</option>
              </select>
              <label>Visa Type:</label>
            </div>
            <div class="form-floating mb-3">
              <input
                class="form-control"
                type="date"
                v-model="data.startDate"
              />
              <label>Start Date:</label>
            </div>
            <div class="form-floating mb-3">
              <input class="form-control" type="date" v-model="data.endDate" />
              <label>End Date:</label>
            </div>
            <div class="form-floating mb-3">
              <select
                class="cpt-4 form-select form-control"
                aria-label="Default select"
                v-model="data.documentType"
              >
                <option>Identity Card</option>
                <option>Passport</option>
              </select>
              <label>Document Type:</label>
            </div>
            <div class="form-floating mb-3">
              <input
                class="form-control"
                type="number"
                v-model="data.documentNumber"
              />
              <label>Document Number:</label>
            </div>
          </div>
          <div class="submit mt-5">
            <button>Reserve</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<style scoped>
button {
  padding: 10px 50px;
  background-color: rgb(194, 227, 255);
  color: #fff;
  margin-top: 20px;
  border: none;
  border-radius: 20px;
  cursor: pointer;
}
button:hover {
  background-color: rgb(147, 205, 255);
  transition: 0.5s;
}
.submit {
  text-align: center;
}
.token-p {
  padding: 8px 0;
  background-color: green;
}
</style>

<script>
import axios from "axios";
export default {
  name: "Main-form",
  data() {
    return {
      data: {
        token: "",
        fullName: "",
        birth: "",
        nationality: "",
        situation: "",
        email: "",
        visaType: "",
        startDate: "",
        endDate: "",
        documentType: "",
        documentNumber: "",
        reservationDate: "2012-12-12",
      },
    };
  },
  methods: {
    async submitHandle() {
      try {
        let result = await axios.post(
          "http://localhost/MyVisa/backend/api/clients/create.php",
          this.data,
          {
            headers: {
              "Content-Type": null,
            },
          }
        );
        sessionStorage.setItem("token", result.data.token);
      } catch (error) {
        console.error(error);
      }
    },
  },
};
</script>


