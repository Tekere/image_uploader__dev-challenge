<template>
  <div class="ly_app bl_app">
    <router-view />
    <div class="ly_footer">
      <div class="bl_footer">created by takara - devChallenges.io</div>
    </div>
  </div>
</template>

<style lang="scss">
@import "./css/reset.css";
html {
  font-size: 16px;
  font-family: "Poppins";
  box-sizing: border-box;
}
.ly_app {
  position: fixed;
  width: 100%;
  height: 100%;
  overflow: hidden;
}
.bl_app {
  background-color: #fafafb;
  font-family: "Poppins";
  color: #4f4f4f;
  letter-spacing: -0.035em;
}
.ly_footer {
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  padding: 24px 0;
}
.bl_footer {
  color: #a9a9a9;
  font-family: "Montserrat";
}

.bl_cont {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  max-width: 400px;
  max-height: 470px;
  width: 400px;
  background-color: #fff;
  padding: 36px 26px;
  border-radius: 12px;
  box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
}
.bl_cont_ttl {
  font-size: 1.125rem;
  font-weight: bold;
  margin-bottom: 1rem;
}
.bl_cont_memo {
  font-size: 10px;
  color: #828282;
}

.el_btn {
  display: block;
  background: #2f80ed;
  color: #fff;
  border-radius: 8px;
  padding: 0.5rem 1rem;
  letter-spacing: -0.035em;
  font-size: 0.75rem;
}
</style>
