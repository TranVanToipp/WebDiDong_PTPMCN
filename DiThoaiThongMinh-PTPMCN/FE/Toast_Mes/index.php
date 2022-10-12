<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
<link rel="stylesheet" href="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/FE/Layout/css/toast.css">
<div id="toast"></div>

<div>
  <div onclick="showSuccessToast();" class="btn btn--success">Show success toast</div>
  <div onclick="showErrorToast();" class="btn btn--danger">Show error toast</div>
</div>

<script>
  function showSuccessToast() {
    toast({
      title: "Thành công!",
      message: "Bạn đã đăng ký thành công tài khoản tại F8.",
      type: "success",
      duration: 5000
    });
  }

  function showErrorToast() {
    toast({
      title: "Thất bại!",
      message: "Có lỗi xảy ra, vui lòng liên hệ quản trị viên.",
      type: "error",
      duration: 5000
    });
  }
</script>

 <!-- Toast function -->
<script src= "../../Javascript/Toast_mes.js"></script>