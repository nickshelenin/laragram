<template>
  <div class="container">
    <button class="btn btn-primary" @click="followUser" v-text="buttonText"></button>
  </div>
</template>

<script>
export default {
  props: ["userId", "follows"],

  mounted() {
    console.log("Component mounted.");
  },

  data: function() {
    return {
      status: this.follows
    };
  },

  //   data: {
  //     status: this.follows
  //   },

  methods: {
    followUser() {
      axios.post("/follow/" + this.userId)
        .then(res => {
          this.status = !this.status;
          //   alert("test");
        })
        .catch(error => {
          if (error.response.status == 401) {
            window.location = "/login";
          }
          console.log(error);
        });
    }
  },

  computed: {
    buttonText() {
      return this.status == true ? "Unfollow" : "Follow";
    }
  }
};
</script>

