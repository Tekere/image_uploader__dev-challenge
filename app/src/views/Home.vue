<template>
  <div class="home">
    <Uploader v-if="!isUploading" @start-uploading="startIsUploading" @stop-uploading="stopIsUploading" />
    <Loading v-else></Loading>
  </div>
</template>

<script>
import Uploader from "@/components/Uploader.vue"
import Loading from "@/components/Loading.vue"

export default {
  name: "Home",
  components: {
    Uploader,
    Loading
  },
  data() {
    return {
      isUploading: false,
      uploadedImagePath: ""
    }
  },
  methods: {
    startIsUploading() {
      this.isUploading = true
    },
    stopIsUploading() {
      this.isUploading = false
    }
  }
}
</script>
<style lang="scss"></style>
