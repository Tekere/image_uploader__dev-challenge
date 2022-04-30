<template>
  <div class="bl_loading bl_cont">
    <h2 class="bl_cont_ttl">Uploading...</h2>
    <div class="bl_loading_loadingBar">
      <div class="bl_loading_loadingBarIcon"></div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Loading"
}
</script>

<style>
.bl_cont.bl_loading {
  padding-bottom: 43px;
}
.bl_cont.bl_loading .bl_cont_ttl {
  margin-bottom: 30px;
}
.bl_loading_loadingBar {
  width: 90%;
  height: 6px;
  background: #f2f2f2;
  border-radius: 8px;
  margin-left: auto;
  margin-right: auto;
  position: relative;
  overflow: hidden;
}
.bl_loading_loadingBarIcon {
  width: 25%;
  height: 100%;
  background: #2f80ed;
  border-radius: 8px;
  position: absolute;
  animation: crossing 1s infinite;
  animation-timing-function: linear;
}

@keyframes crossing {
  0% {
    transform: translatex(-100%);
  }

  100% {
    transform: translatex(400%);
  }
}
</style>