<template>
  <div class="home">
    <Loading v-if="isUploading"></Loading>
    <div v-else>
      <Uploader
        v-if="!uploadedImagePath"
        @start-uploading="startIsUploading"
        @stop-uploading="stopIsUploading"
        @get-uploaded-image-path="getUploadedImagePath"
      />
      <complete v-else-if="uploadedImagePath"></complete>
    </div>
  </div>
</template>

<script>
import Uploader from "@/components/Uploader.vue"
import Loading from "@/components/Loading.vue"
import Complete from "@/components/Complete.vue"

export default {
  name: "Home",
  components: {
    Uploader,
    Loading,
    Complete
  },
  data() {
    return {
      isUploading: false,
      uploadedImagePath: "yeah"
    }
  },
  methods: {
    // アップロード中のローディングフラグ制御
    startIsUploading() {
      this.isUploading = true
    },
    // アップロード中のローディングフラグ制御
    stopIsUploading() {
      this.isUploading = false
    },
    // アップロード成功した画像のパスを$emitで受け取る
    getUploadedImagePath(ppp) {
      this.uploadedImagePath = ppp
    }
  }
}
</script>
<style lang="scss"></style>
