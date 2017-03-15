package app.pizzar;

import android.app.Application;
import android.content.Context;
import android.content.SharedPreferences;
import android.text.TextUtils;

import com.android.volley.DefaultRetryPolicy;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.toolbox.Volley;
import com.crashlytics.android.Crashlytics;
import com.crashlytics.android.core.CrashlyticsCore;

import io.fabric.sdk.android.Fabric;
import timber.log.Timber;

public class MyApplication extends Application {
    public static final String TAG = MyApplication.class.getSimpleName();
    private static MyApplication mInstance;
    private RequestQueue mRequestQueue;
    public static synchronized MyApplication getInstance() {
        return mInstance;
    }

    @Override
    public void onCreate() {
        super.onCreate();
        // Initialize Fabric with the debug-disabled Crashlytics
        // See https://docs.fabric.io/android/crashlytics/build-tools.html#disabling-crashlytics-for-debug-builds
        Fabric.with(this, new Crashlytics.Builder()
                .core(new CrashlyticsCore.Builder().disabled(BuildConfig.DEBUG).build()).build());
        //setStrictMode();
        mInstance = this;
        initializeTimber();

        //        RxJavaPlugins.getInstance().registerErrorHandler(new RxJavaErrorHandler() {
        //            @Override
        //            public void handleError(final Throwable e) {
        //                super.handleError(e);
        //                Timber.e(e.toString());
        //            }
        //        });
        //        // Build the RealmConfiguration and set it to the default.
        //        Realm.setDefaultConfiguration(getRealmConfig());
    }

    //    public static SharedPreferences getSharedPrefs() {
    //        return mInstance.getSharedPreferences(Config.SHARED_PREF, Context.MODE_PRIVATE);
    //    }

    public RequestQueue getRequestQueue() {
        if (mRequestQueue == null) {
            mRequestQueue = Volley.newRequestQueue(getApplicationContext());
        }

        return mRequestQueue;
    }

    public <T> void addToRequestQueue(final Request<T> req,
                                      final String tag) {
        // set the default tag if tag is empty
        req.setRetryPolicy(
                new DefaultRetryPolicy(6 * 3000, 1, DefaultRetryPolicy.DEFAULT_BACKOFF_MULT));
        req.setTag(TextUtils.isEmpty(tag) ? TAG : tag);
        getRequestQueue().add(req);
    }

    public <T> void addToRequestQueue(final Request<T> req) {
        req.setTag(TAG);
        getRequestQueue().add(req);
    }

    public void cancelPendingRequests(final Object tag) {
        if (mRequestQueue != null) {
            mRequestQueue.cancelAll(tag);
        }
    }

    protected void initializeTimber() {
        Timber.plant(new Timber.DebugTree());
    }
}
