<template>
  <div class="px-4 px-lg-5">
    <div class="form-wrapper gx-4 gx-lg-5 mb-5 bg-light rounded-4 p-5">
      <div class="container px-5">
        <div
          class="
            token-p
            mb-3
            text-center
            rounded-2
            text-black
            d-flexf
            flex-column
            align-items-center
            justify-content-center
          "
        >
          <!-- <div class="d-grid gap-2 w-50">
            <button type="button" class="btn btn-primary" v-on:click="showToken()">
              show token
            </button>
          </div> -->
          <p class="m-0">
            Your token is: {{ token ? token : "Not Created Yet" }}
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "home-page",
  data() {
    return {
      token: sessionStorage.getItem("token"),
    };
  },
  methods: {
    showToken() {
      sessionStorage.removeItem("token");
    },
  },
};
</script>
