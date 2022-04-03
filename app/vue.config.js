module.exports = {
  devServer: {
    proxy: {
      "^/api": {
        target: "http://localhost:8888/image_uploader__devc/",
        changeOrigin: true,
        logLevel: "debug"
      }
    }
  }
}
