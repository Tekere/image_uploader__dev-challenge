<template>
  <div class="bl_complete bl_cont">
    <h2 class="bl_cont_ttl bl_complete_ttl">
      <img src="@/assets/check.svg" alt="" class="bl_cont_ttl_icon" />
      <span>Uploaded Successfully!</span>
    </h2>
    <div class="bl_complete_imageArea">
      <figure class="bl_complete_imageArea_img_wrapper">
        <img :src="'/images/' + uploadedImageName" alt="" class="bl_complete_imageArea_img" />
      </figure>
      <div class="bl_complete_imageArea_pathArea">
        <span class="bl_complete_imageArea_path">
          {{ uploadedImagePath }}
        </span>
        <button @click="copy_link" class="bl_complete_imageArea_btn el_btn">Copy Link</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Complete",
  props: {
    uploadedImageName: {
      type: String,
      default: "noimage.png"
    }
  },
  computed: {
    uploadedImagePath() {
      return document.URL + "images/" + this.uploadedImageName
    }
  },
  methods: {
    copy_link() {
      navigator.clipboard
        .writeText(this.uploadedImagePath)
        .then(() => {
          window.alert("copied")
        })
        .catch((e) => {
          console.log(e)
        })
    }
  }
}
</script>

<style>
.bl_complete_ttl {
  text-align: center;
}
.bl_cont_ttl_icon {
  width: 2.25rem;
  height: auto;
  display: block;
  margin-left: auto;
  margin-right: auto;
  margin-bottom: 0.4rem;
}
.bl_complete_imageArea {
  width: 100%;
  height: 70%;
}
.bl_complete_imageArea_pathArea {
  display: flex;
  align-items: center;
  background: #f6f8fb;
  border: 1px solid #e0e0e0;
  box-sizing: border-box;
  border-radius: 8px;
  padding: 2px 1px 2px 8px;
}
.bl_complete_imageArea_img_wrapper {
  position: relative;
  padding-top: 56.25%;
  overflow: hidden;
  border-radius: 12px;
  margin-bottom: 1.5rem;
}
.bl_complete_imageArea_img {
  display: block;
  position: absolute;
  object-fit: cover;
  top: 0;
  left: 50%;
  transform: translateX(-50%);
  height: 100%;
  margin-left: auto;
  margin-right: auto;
}
.bl_complete_imageArea_path {
  overflow: hidden;
  flex: 1;
  font-size: 0.6rem;
}
.bl_complete_imageArea_btn.el_btn {
  font-size: 0.6rem;
}
</style>