<template>
  <div class="home">
    <Loading v-if="isUploading"></Loading>
    <div v-else>
      <Uploader
        v-if="!uploadedImageName"
        @start-uploading="startIsUploading"
        @stop-uploading="stopIsUploading"
        @get-uploaded-image-path="getUploadedImageName"
      />
      <complete v-else-if="uploadedImageName" :uploaded-image-name="uploadedImageName"></complete>
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
      uploadedImageName: ""
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
    getUploadedImageName(name) {
      // dataにセットする
      this.uploadedImageName = name
    }
  }
}
</script>
<style lang="scss">
.home {
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>
