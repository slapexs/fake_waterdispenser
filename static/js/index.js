function setCookieMachineNumber() {
  let machineNumber = undefined;
  if (document.cookie == '') {
    machineNumber = prompt('เลขตู้กดน้ำ');
    document.cookie = `machine=${machineNumber}; path=/`;
    window.location.reload();
  }
}

setCookieMachineNumber();
