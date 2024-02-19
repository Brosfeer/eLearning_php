void import 'package:flutter/material.dart';

void main() => runApp(const MyApp());

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Material App',
      home: Scaffold(
        appBar: AppBar(
          title: const Text('Material App Bar'),
        ),
        body: const Center(
          child: ElText(),
        ),
      ),
    );
  }
}

ElText(title:context.locale.toString()=="ar_EG"?(billerController.cashierList[index].status
                                          .trim())
                                          .toString() ==
"open"
                                          ? "مفقوح"
                                          :"مغلق"
                                          :(billerController.cashierList[index].status
                                          .trim()), color: (billerController.cashierList[index].status
                                          .trim())
                                          .toString() ==
                                          "open"
                                          ? Colors
                                          .greenAccent
                                          :Colors
                                          .red, size: PSize.medium)