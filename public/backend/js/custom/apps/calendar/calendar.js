"use strict";
var KTAppCalendar = (function () {
    var e,
        t,
        n,
        a,
        o,
        r,
        i,
        l,
        d,
        s,
        c,
        m,
        u,
        v,
        f,
        p,
        y,
        _,
        D,
        g,
        k,
        b,
        S,
        h,
        T,
        Y,
        w,
        E,
        L,
        M = { id: "", eventName: "", eventDescription: "", eventLocation: "", startDate: "", endDate: "", allDay: !1 };
    const x = () => {
            (v.innerText = "Add a New Event"), u.show();
            const o = f.querySelectorAll('[data-kt-calendar="datepicker"]'),
                i = f.querySelector("#kt_calendar_datepicker_allday");
            i.addEventListener("click", (e) => {
                e.target.checked
                    ? o.forEach((e) => {
                          e.classList.add("d-none");
                      })
                    : (l.setDate(M.startDate, !0, "Y-m-d"),
                      o.forEach((e) => {
                          e.classList.remove("d-none");
                      }));
            }),
                C(M),
                (p = FormValidation.formValidation(f, {
                    fields: {
                        calendar_event_name: { validators: { notEmpty: { message: "Event name is required" } } },
                        calendar_event_start_date: { validators: { notEmpty: { message: "Start date is required" } } },
                        calendar_event_end_date: { validators: { notEmpty: { message: "End date is required" } } },
                    },
                    plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) },
                })),
                _.addEventListener("click", function (o) {
                    o.preventDefault(),
                        p &&
                            p.validate().then(function (o) {
                                console.log("validated!"),
                                    "Valid" == o
                                        ? (_.setAttribute("data-kt-indicator", "on"),
                                          (_.disabled = !0),
                                          setTimeout(function () {
                                              _.removeAttribute("data-kt-indicator"),
                                                  Swal.fire({ text: "New event added to calendar!", icon: "success", buttonsStyling: !1, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn btn-primary" } }).then(function (
                                                      o
                                                  ) {
                                                      if (o.isConfirmed) {
                                                          u.hide(), (_.disabled = !1);
                                                          let o = !1;
                                                          i.checked && (o = !0), 0 === s.selectedDates.length && (o = !0);
                                                          var d = moment(r.selectedDates[0]).format(),
                                                              c = moment(l.selectedDates[l.selectedDates.length - 1]).format();
                                                          if (!o) {
                                                              const e = moment(r.selectedDates[0]).format("YYYY-MM-DD"),
                                                                  t = e;
                                                              (d = e + "T" + moment(s.selectedDates[0]).format("HH:mm:ss")), (c = t + "T" + moment(m.selectedDates[0]).format("HH:mm:ss"));
                                                          }
                                                          e.addEvent({ id: A(), title: t.value, description: n.value, location: a.value, start: d, end: c, allDay: o }), e.render(), f.reset();
                                                      }
                                                  });
                                          }, 2e3))
                                        : Swal.fire({
                                              text: "Sorry, looks like there are some errors detected, please try again.",
                                              icon: "error",
                                              buttonsStyling: !1,
                                              confirmButtonText: "Ok, got it!",
                                              customClass: { confirmButton: "btn btn-primary" },
                                          });
                            });
                });
        },
        B = () => {
            var e, t, n;
            w.show(),
                M.allDay
                    ? ((e = "All Day"), (t = moment(M.startDate).format("Do MMM, YYYY")), (n = moment(M.endDate).format("Do MMM, YYYY")))
                    : ((e = ""), (t = moment(M.startDate).format("Do MMM, YYYY - h:mm a")), (n = moment(M.endDate).format("Do MMM, YYYY - h:mm a"))),
                (k.innerText = M.eventName),
                (b.innerText = e),
                (S.innerText = M.eventDescription ? M.eventDescription : "--"),
                (h.innerText = M.eventLocation ? M.eventLocation : "--"),
                (T.innerText = t),
                (Y.innerText = n);
        },
        q = () => {
            E.addEventListener("click", (o) => {
                o.preventDefault(),
                    w.hide(),
                    (() => {
                        (v.innerText = "Edit an Event"), u.show();
                        const o = f.querySelectorAll('[data-kt-calendar="datepicker"]'),
                            i = f.querySelector("#kt_calendar_datepicker_allday");
                        i.addEventListener("click", (e) => {
                            e.target.checked
                                ? o.forEach((e) => {
                                      e.classList.add("d-none");
                                  })
                                : (l.setDate(M.startDate, !0, "Y-m-d"),
                                  o.forEach((e) => {
                                      e.classList.remove("d-none");
                                  }));
                        }),
                            C(M),
                            (p = FormValidation.formValidation(f, {
                                fields: {
                                    calendar_event_name: { validators: { notEmpty: { message: "Event name is required" } } },
                                    calendar_event_start_date: { validators: { notEmpty: { message: "Start date is required" } } },
                                    calendar_event_end_date: { validators: { notEmpty: { message: "End date is required" } } },
                                },
                                plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) },
                            })),
                            _.addEventListener("click", function (o) {
                                o.preventDefault(),
                                    p &&
                                        p.validate().then(function (o) {
                                            console.log("validated!"),
                                                "Valid" == o
                                                    ? (_.setAttribute("data-kt-indicator", "on"),
                                                      (_.disabled = !0),
                                                      setTimeout(function () {
                                                          _.removeAttribute("data-kt-indicator"),
                                                              Swal.fire({
                                                                  text: "New event added to calendar!",
                                                                  icon: "success",
                                                                  buttonsStyling: !1,
                                                                  confirmButtonText: "Ok, got it!",
                                                                  customClass: { confirmButton: "btn btn-primary" },
                                                              }).then(function (o) {
                                                                  if (o.isConfirmed) {
                                                                      u.hide(), (_.disabled = !1), e.getEventById(M.id).remove();
                                                                      let o = !1;
                                                                      i.checked && (o = !0), 0 === s.selectedDates.length && (o = !0);
                                                                      var d = moment(r.selectedDates[0]).format(),
                                                                          c = moment(l.selectedDates[l.selectedDates.length - 1]).format();
                                                                      if (!o) {
                                                                          const e = moment(r.selectedDates[0]).format("YYYY-MM-DD"),
                                                                              t = e;
                                                                          (d = e + "T" + moment(s.selectedDates[0]).format("HH:mm:ss")), (c = t + "T" + moment(m.selectedDates[0]).format("HH:mm:ss"));
                                                                      }
                                                                      e.addEvent({ id: A(), title: t.value, description: n.value, location: a.value, start: d, end: c, allDay: o }), e.render(), f.reset();
                                                                  }
                                                              });
                                                      }, 2e3))
                                                    : Swal.fire({
                                                          text: "Sorry, looks like there are some errors detected, please try again.",
                                                          icon: "error",
                                                          buttonsStyling: !1,
                                                          confirmButtonText: "Ok, got it!",
                                                          customClass: { confirmButton: "btn btn-primary" },
                                                      });
                                        });
                            });
                    })();
            });
        },
        C = () => {
            (t.value = M.eventName ? M.eventName : ""), (n.value = M.eventDescription ? M.eventDescription : ""), (a.value = M.eventLocation ? M.eventLocation : ""), r.setDate(M.startDate, !0, "Y-m-d");
            const e = M.endDate ? M.endDate : moment(M.startDate).format();
            l.setDate(e, !0, "Y-m-d");
            const o = f.querySelector("#kt_calendar_datepicker_allday"),
                i = f.querySelectorAll('[data-kt-calendar="datepicker"]');
            M.allDay
                ? ((o.checked = !0),
                  i.forEach((e) => {
                      e.classList.add("d-none");
                  }))
                : (s.setDate(M.startDate, !0, "Y-m-d H:i"),
                  m.setDate(M.endDate, !0, "Y-m-d H:i"),
                  l.setDate(M.startDate, !0, "Y-m-d"),
                  (o.checked = !1),
                  i.forEach((e) => {
                      e.classList.remove("d-none");
                  }));
        },
        N = (e) => {
            (M.id = e.id), (M.eventName = e.title), (M.eventDescription = e.description), (M.eventLocation = e.location), (M.startDate = e.startStr), (M.endDate = e.endStr), (M.allDay = e.allDay);
        },
        A = () => Date.now().toString() + Math.floor(1e3 * Math.random()).toString();
    return {
        init: function () {
            const p = document.getElementById("kt_modal_add_event");
            (f = p.querySelector("#kt_modal_add_event_form")),
                (t = f.querySelector('[name="calendar_event_name"]')),
                (n = f.querySelector('[name="calendar_event_description"]')),
                (a = f.querySelector('[name="calendar_event_location"]')),
                (o = f.querySelector("#kt_calendar_datepicker_start_date")),
                (i = f.querySelector("#kt_calendar_datepicker_end_date")),
                (d = f.querySelector("#kt_calendar_datepicker_start_time")),
                (c = f.querySelector("#kt_calendar_datepicker_end_time")),
                (y = document.querySelector('[data-kt-calendar="add"]')),
                (_ = f.querySelector("#kt_modal_add_event_submit")),
                (D = f.querySelector("#kt_modal_add_event_cancel")),
                (g = p.querySelector("#kt_modal_add_event_close")),
                (v = f.querySelector('[data-kt-calendar="title"]')),
                (u = new bootstrap.Modal(p));
            const C = document.getElementById("kt_modal_view_event");
            var H, F, V, O, I, R;
            (w = new bootstrap.Modal(C)),
                (k = C.querySelector('[data-kt-calendar="event_name"]')),
                (b = C.querySelector('[data-kt-calendar="all_day"]')),
                (S = C.querySelector('[data-kt-calendar="event_description"]')),
                (h = C.querySelector('[data-kt-calendar="event_location"]')),
                (T = C.querySelector('[data-kt-calendar="event_start_date"]')),
                (Y = C.querySelector('[data-kt-calendar="event_end_date"]')),
                (E = C.querySelector("#kt_modal_view_event_edit")),
                (L = C.querySelector("#kt_modal_view_event_delete")),
                (H = document.getElementById("kt_calendar_app")),
                (F = moment().startOf("day")),
                (V = F.format("YYYY-MM")),
                (O = F.clone().subtract(1, "day").format("YYYY-MM-DD")),
                (I = F.format("YYYY-MM-DD")),
                (R = F.clone().add(1, "day").format("YYYY-MM-DD")),
                (e = new FullCalendar.Calendar(H, {
                    headerToolbar: { left: "prev,next today", center: "title", right: "dayGridMonth,timeGridWeek,timeGridDay" },
                    initialDate: I,
                    navLinks: !0,
                    selectable: !0,
                    selectMirror: !0,
                    select: function (e) {
                        N(e), x();
                    },
                    eventClick: function (e) {
                        N({ id: e.event.id, title: e.event.title, description: e.event.extendedProps.description, location: e.event.extendedProps.location, startStr: e.event.startStr, endStr: e.event.endStr, allDay: e.event.allDay }), B();
                    },
                    editable: !0,
                    dayMaxEvents: !0,
                    events: [
                                           
                    ],
                })).render(),
                (r = flatpickr(o, { enableTime: !1, dateFormat: "Y-m-d" })),
                (l = flatpickr(i, { enableTime: !1, dateFormat: "Y-m-d" })),
                (s = flatpickr(d, { enableTime: !0, noCalendar: !0, dateFormat: "H:i" })),
                (m = flatpickr(c, { enableTime: !0, noCalendar: !0, dateFormat: "H:i" })),
                q(),
                y.addEventListener("click", (e) => {
                    (M = { id: "", eventName: "", eventDescription: "", startDate: "", endDate: "", allDay: !1 }), x();
                }),
                L.addEventListener("click", (t) => {
                    t.preventDefault(),
                        Swal.fire({
                            text: "Are you sure you would like to delete this event?",
                            icon: "warning",
                            showCancelButton: !0,
                            buttonsStyling: !1,
                            confirmButtonText: "Yes, delete it!",
                            cancelButtonText: "No, return",
                            customClass: { confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light" },
                        }).then(function (t) {
                            t.value
                                ? (e.getEventById(M.id).remove(), w.hide())
                                : "cancel" === t.dismiss && Swal.fire({ text: "Your event was not deleted!.", icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn btn-primary" } });
                        });
                }),
                D.addEventListener("click", function (e) {
                    e.preventDefault(),
                        Swal.fire({
                            text: "Are you sure you would like to cancel?",
                            icon: "warning",
                            showCancelButton: !0,
                            buttonsStyling: !1,
                            confirmButtonText: "Yes, cancel it!",
                            cancelButtonText: "No, return",
                            customClass: { confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light" },
                        }).then(function (e) {
                            e.value
                                ? (f.reset(), u.hide())
                                : "cancel" === e.dismiss && Swal.fire({ text: "Your form has not been cancelled!.", icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn btn-primary" } });
                        });
                }),
                g.addEventListener("click", function (e) {
                    e.preventDefault(),
                        Swal.fire({
                            text: "Are you sure you would like to cancel?",
                            icon: "warning",
                            showCancelButton: !0,
                            buttonsStyling: !1,
                            confirmButtonText: "Yes, cancel it!",
                            cancelButtonText: "No, return",
                            customClass: { confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light" },
                        }).then(function (e) {
                            e.value
                                ? (f.reset(), u.hide())
                                : "cancel" === e.dismiss && Swal.fire({ text: "Your form has not been cancelled!.", icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn btn-primary" } });
                        });
                });
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTAppCalendar.init();
});
