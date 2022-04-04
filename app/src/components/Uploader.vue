<template>
  <div>
    <div class="bl_uploader bl_cont">
      <h2 class="bl_cont_ttl bl_uploader_ttl">Upload your image</h2>
      <p class="bl_cont_memo bl_uploader_topMemo">File should be Jpeg, Png,...</p>
      <div class="bl_uploader_uploadArea">
        <img src="@/assets/upload-area.svg" alt="" class="bl_uploader_uploadArea_img" />
        <p class="bl_uploader_uploadArea_memo">Drag & Drop your image here</p>
        <input
          @change="upload"
          type="file"
          name="upload_file"
          id="input_file"
          class="bl_uploader_uploadArea_input"
          ref="input_file"
        />
        <input type="hidden" name="test" value="test" />
      </div>
      <p class="bl_uploader_or">Or</p>
      <button @click.prevent="selectImgFile" class="el_btn bl_uploader_uploadBtn">Choose a file</button>
    </div>
  </div>
</template>

<script>
import axios from "axios"
export default {
  name: "Uploader",
  data() {
    return {}
  },
  methods: {
    // ファイル選択を起動させる処理
    selectImgFile() {
      // input[type='file']のDOMをクリックさせる
      this.$refs.input_file.click()
    },
    // 画像アップロード処理
    upload(e) {
      // 1.選択されたファイルだけを取得する。
      let file = e.target.files[0]

      /* 2. バリデーションを通ればUploadする
            バリデーションに引っかかればinputを初期化する 
      */
      if (this.validate_uploadFile(file)) {
        // axiosのPOST処理

        // まず、FormDataクラスを作って、選択されたファイルをセットする。
        let params = new FormData()
        params.append("file", file)
        // ファイルをPOSTする用のヘッダーを定義
        const headers = { "content-type": "multipart/form-data" }
        // POST実行
        axios
          .post("/api/upload.php", params, { headers })
          .then((response) => {
            console.log(response.data)
          })
          .catch((err) => {
            console.log("error:", err)
          })
      } else {
        this.$refs.input_file.value = ""
      }
    },
    // 選択されたファイルが画像ファイルかどうかと2MB以内であるかか検査するメソッド
    validate_uploadFile(target) {
      // fileType
      if (target.type != "image/jpeg" && target.type != "image/gif" && target.type != "image/png") {
        alert(".jpg .png .gifのいずれかのファイルのみ許可されています")
        return false
      }
      // size
      if (target.size > 2000000) {
        alert("ファイルの上限サイズ2MBを超えています")
        return false
      }
      return true
    }
  }
}
</script>

<style lang="scss">
.bl_uploader {
  background-color: #fff;
  padding: 36px 26px;
}
.bl_uploader_ttl {
  text-align: center;
}
.bl_uploader_topMemo {
  text-align: center;
  margin-bottom: 1.5rem;
}
.bl_uploader_uploadArea {
  width: 100%;
  background: #f6f8fb;
  padding-top: 2rem;
  padding-bottom: 2.3rem;
  box-shadow: 0px 4px 12px 0px #0000001a;
  border-radius: 12px;
  border: 1px dashed #97bef4;
  text-align: center;
  position: relative;
}
.bl_uploader_uploadArea_img {
  width: 33.2%;
  margin-bottom: 2.3rem;
}
.bl_uploader_uploadArea_memo {
  color: #bdbdbd;
  font-size: 0.75rem;
}
.bl_uploader_or {
  color: #bdbdbd;
  text-align: center;
  margin-top: 1rem;
  margin-bottom: 1rem;
}
.bl_uploader_uploadBtn {
  margin-left: auto;
  margin-right: auto;
}
.bl_uploader_uploadArea_input {
  position: absolute;
  widows: 100%;
  height: 100%;
  top: 0;
  left: 0;
  opacity: 0;
}
</style>
