DOC = document;
_HOST_ = "//" + window.location.host + "/";
function URI(A = false, B = false) {
  let H = window.location.href
    .split("?")[0]
    .replace(/^\/|\/$/g, "")
    .substring(_HOST_.length - 1);
  if (A !== false) {
    let u = H.split("/");
    H = "";
    if (A == "last") A = u.length - 1;
    if (u.hasOwnProperty(A)) {
      H = u[A];
    }
    if (B !== false) H = H == B;
  } else H = H.replace(/^\/|\/$/g, "").split("?")[0];
  return H;
}
function GET(A = false) {
  let url_string = window.location.href;
  let url = new URL(url_string);
  let h = url.searchParams.get(A) ?? "";

  return h;
}
qs = (key) => DOC.querySelector(key);
qsa = (key) => DOC.querySelectorAll(key);
ce = (key) => DOC.createElement(key);
(str = {}), (num = {}), (obj = {}), (html = {}), (fData = {});

html.qs = function (key) {
  return this.querySelector(key);
};
html.qsa = function (key) {
  return this.querySelectorAll(key);
};

html.htmlFirst = function (html) {
  this.insertAdjacentHTML("afterbegin", html);
};
html.htmlLast = function (html) {
  this.insertAdjacentHTML("beforeend", html);
};
html.htmlBefore = function (html) {
  this.insertAdjacentHTML("beforebegin", html);
};
html.htmlAfter = function (html) {
  this.insertAdjacentHTML("afterend", html);
};
html.html = function (a = false) {
  if (a === false) return this.innerHTML;
  else {
    this.innerHTML = a;
    return this;
  }
};
html.text = function (a = false) {
  if (a === false) return this.innerText;
  else {
    this.innerText = a;
    return this;
  }
};
html.val = function (a = false) {
  if (a === false) return this.value;
  else {
    this.value = a;
    return this;
  }
};

html.Val = function () {
  return this.value;
};
html.Show = function () {
  let ts = this.style;
  ts.transition = "visibility .2s linear,opacity .2s linear";
  setTimeout(() => {
    ts.visibility = "visible";
    ts.opacity = "1";
  });
  return this;
};
html.Hide = function () {
  let ts = this.style;
  ts.transition = "visibility .2s linear,opacity .2s linear";
  setTimeout(() => {
    ts.visibility = "hidden";
    ts.opacity = "0";
  });
  return this;
};
html.attr = function (key = null, val = null) {
  if (key === null) {
    let attrs = this.attributes,
      i = attrs.length,
      attr = {};
    while (i--) {
      attr[attrs[i].name] = attrs[i].value;
    }
    return attr;
  } else if (val === null) return this.getAttribute(key);
  else this.setAttribute(key, val);
  return this;
};

html.removeAttr = function (a) {
  this.removeAttribute(a);
  return this;
};
html.hasAttr = function (a) {
  return this.hasAttribute(a);
};
html.class = function (a = 0) {
  return this.classList[a] ?? "";
};
html.addClass = function (a) {
  this.classList.add(a);
  return this;
};
html.removeClass = function (a) {
  a = a.split(",");
  a.forEach((v, i) => {
    this.classList.remove(v.trim());
  });
  return this;
};
html.hasClass = function (a) {
  return this.classList.contains(a);
};
html.toggleClass = function (a) {
  this.classList.toggle(a);
  return this;
};

html.Index = function () {
  let nodes = Array.prototype.slice.call(this.parentElement.children);
  return nodes.indexOf(this);
};

html.indexBy = function (a) {
  let ini = this.PrevElem;
  let n = 0;
  while (ini !== null) {
    if (ini.closest(a) == ini) n++;
    ini = ini.PrevElem;
  }
  return n;
};

html.NextElem = function () {
  return this.nextElementSibling;
};
html.PrevElem = function () {
  return this.previousElementSibling;
};
html.Next = function () {
  return this.nextSibling;
};
html.Prev = function () {
  return this.previousSibling;
};
html.addTrigger = function (a) {
  let event = new MouseEvent(a, {
    view: window,
    bubbles: true,
    cancelable: true,
  });
  this.dispatchEvent(event);
  return this;
};
html.data = function (a = false) {
  let h = {};
  let attr = this.attr();
  for (let k in attr) {
    if (attr.hasOwnProperty(k) && k.split("-")[0] == "data") {
      h[k] = attr[k];
    }
  }
  return h;
};
html.mouseEvent = function (a) {
  let ev = new MouseEvent(a, {
    view: window,
    bubbles: true,
    cancelable: true,
  });
  this.dispatchEvent(ev);
  return this;
};
html.DblClick = function () {
  return this.mouseEvent("dblclick");
};

str.IsJson = function () {
  let js = false;
  try {
    js = JSON.parse(this);
  } catch (e) {
    return false;
  }
  return (
    ["[object Object]", "[object Array]"].indexOf(
      Object.prototype.toString.call(js)
    ) > -1
  );
  // return Array.isArray(js);
};
str.Jsd = function () {
  if (this.IsJson) return JSON.parse(this);
  else return [];
};

str.FirstUpper = function () {
  return this.charAt(0).toUpperCase() + this.slice(1);
};

listBulan = [
  "Januari",
  "Februari",
  "Maret",
  "April",
  "Mei",
  "Juni",
  "Juli",
  "Agustus",
  "September",
  "Oktober",
  "November",
  "Desember",
];
listHari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
str.Tgl = function () {
  let t = this.split(" ");
  let dt = new Date(this);
  d = "";
  d += (t[2] ?? dt.getFullYear()) + "-";
  t[1] = t[1] ?? dt.getMonth() + 1;
  if (isNaN(t[1])) {
    let bln = dt.getMonth() + 1;
    listBulan.forEach((itm, i) => {
      if (itm.toLowerCase().indexOf(t[1].toLowerCase().trim()) > -1)
        bln = i + 1;
    });
    d += bln;
  } else d += t[1];
  d += "-" + t[0];
  return d;
};
str.tgl = function (a = "dd mmmm yyyy") {
  if (this.substring(0, 4) == "0000" || parseInt(this.substring(0, 4)) < 2000)
    return "";
  let H = a;
  let d = new Date(this);
  let tg = d.getDate();
  if (isNaN(tg)) return "";
  let bln = d.getMonth();
  let bl = bln + 1;
  let bl2 = listBulan[bln];
  let th = d.getFullYear();
  let hr = d.getHours();
  let mn = d.getMinutes();
  let sc = d.getSeconds();
  let dy = listHari[d.getDay()];

  if (H.indexOf("h") > -1) H = H.replace("h", (hr < 10 ? "0" : "") + hr);
  if (H.indexOf("i") > -1) H = H.replace("i", (mn < 10 ? "0" : "") + mn);
  if (H.indexOf("s") > -1) H = H.replace("s", (sc < 10 ? "0" : "") + sc);

  if (H.indexOf("DD") > -1) H = H.replace("DD", dy);
  else if (H.indexOf("D") > -1)
    H = H.replace("D", dy.toString().substring(0, 3));
  if (H.indexOf("dd") > -1) H = H.replace("dd", (tg < 10 ? "0" : "") + tg);
  else if (H.indexOf("d") > -1) H = H.replace("d", tg);
  if (H.indexOf("yyyy") > -1) H = H.replace("yyyy", th);
  else if (H.indexOf("yy") > -1)
    H = H.replace("yy", th.toString().substring(2, 4));
  if (H.indexOf("mmmm") > -1) H = H.replace("mmmm", bl2);
  else if (H.indexOf("mmm") > -1)
    H = H.replace("mmm", bl2.toString().substring(0, 3));
  else if (H.indexOf("mm") > -1) H = H.replace("mm", (bl < 10 ? "0" : "") + bl);
  else if (H.indexOf("m") > -1) H = H.replace("m", bl);
  return H;
};
obj.Jse = function () {
  return JSON.stringify(this);
};
obj.JseF = function () {
  return JSON.stringify(this, null, "\t");
};
dateTimeNow = new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
  .toISOString()
  .replace(/T/g, " ")
  .slice(0, -8);
dateNow = dateTimeNow.slice(0, -6);
function xCodePost() {
  this.FDone = () => "";
  this.FProgress = () => "";
  //============> Progress <==============//
  this.progress = (a = "") => {
    if (typeof a === "function") this.FProgress = a;
    return this;
  };
  //============> Done Selesai <==============//
  this.done = (a = "") => {
    if (typeof a === "function") this.FDone = a;
    return this;
  };
  //============> Post <==============//
  this.post = (fdata) => {
    var XHR = new XMLHttpRequest();
    XHR.open("POST", "x-code-proses.aspx", true);
    XHR.responseType = "json";
    XHR.addEventListener(
      "load",
      (respon) => {
        this.FDone(respon.target.response);
      },
      false
    );
    XHR.send(fdata);
    return this;
  };
}

fData.post = function (url, done = false, progress = false) {
  var XHR = new XMLHttpRequest();
  XHR.open("POST", _HOST_ + url, true);
  XHR.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (typeof done === "function") {
        let res = this.responseText;
        try {
          res = JSON.parse(this.responseText);
        } catch (e) {}
        done(res);
      }
    }
  };
  XHR.send(this);
};

arrPrototype = {};
arrPrototype.str = "String";
arrPrototype.num = "Number";
arrPrototype.obj = "Object";
arrPrototype.html = "HTMLElement";
arrPrototype.fData = "FormData";

let k1, k2;
for (k1 in arrPrototype) {
  if (arrPrototype.hasOwnProperty(k1) && window.hasOwnProperty(k1)) {
    let prot = window[k1];
    // window.html
    for (k2 in prot) {
      if (prot.hasOwnProperty(k2) && k2.substring(0, 4) !== "set_") {
        let attr = { get: prot[k2] };
        if (k2.substring(0, 1) == k2.substring(0, 1).toLocaleLowerCase()) {
          attr = { value: prot[k2] };
        } else {
          attr.set = prot["set_" + k2] ?? function () {};
        }

        Object.defineProperty(window[arrPrototype[k1]].prototype, k2, attr);
      }
    }
  }
}
